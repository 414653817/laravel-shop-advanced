<?php
namespace App\Console\Commands\Cron;


use App\Jobs\RefundCrowdfundingOrders;
use App\Services\OrderService;
use App\Models\CrowdfundingProduct;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

//最后我们需要在 Kernel 中注册这个定时任务：
class FinishCrowdfunding extends Command
{
    protected $signature = 'cron:finish-crowdfunding';

    protected $description = '结束众筹';

    public function handle()
    {
        CrowdfundingProduct::query()
            // 预加载商品数据
            ->with(['product'])
            // 众筹结束时间早于当前时间
            ->where('end_at', '<=', Carbon::now())
            // 众筹状态为众筹中
            ->where('status', CrowdfundingProduct::STATUS_FUNDING)
            ->get()
            ->each(function (CrowdfundingProduct $crowdfunding) {
                // 如果众筹目标金额大于实际众筹金额
                if ($crowdfunding->target_amount > $crowdfunding->total_amount) {
                    // 调用众筹失败逻辑
                    $this->crowdfundingFailed($crowdfunding);
                } else {
                    // 否则调用众筹成功逻辑
                    $this->crowdfundingSucceed($crowdfunding);
                }
            });
    }

    protected function crowdfundingSucceed(CrowdfundingProduct $crowdfunding)
    {
        // 只需将众筹状态改为众筹成功即可
        $crowdfunding->update([
            'status' => CrowdfundingProduct::STATUS_SUCCESS,
        ]);
    }

    protected function crowdfundingFailed(CrowdfundingProduct $crowdfunding)
    {
        // 将众筹状态改为众筹失败
        $crowdfunding->update([
            'status' => CrowdfundingProduct::STATUS_FAIL,
        ]);

        //在 Laravel 框架下，至多只能有一台服务器在执行定时任务，否则就会出现一个定时任务被多台服务器执行的情况。
        //而只有一台定时任务服务器会导致以下问题：
        //假如有 A、B 两个定时任务需要在同一时间点执行，只有等到任务 A 执行完毕之后才会执行 B，如果任务 A 是个长耗时的任务，那任务 B 就会比预计的执行时间要晚
        //如果定时任务中有消耗 CPU、内存或者带宽的操作，可能会使执行定时任务的服务器负载过高，从而影响定时任务的执行效率
        //对此我们可以使用 Laravel 的异步队列功能，把定时任务中长耗时的操作异步化，从而避免某个定时任务耗时太长的问题；
        //同时也可以让这些任务分散到不同的队列处理服务器上，减轻定时任务服务器压力
        dispatch(new RefundCrowdfundingOrders($crowdfunding));  //以下代码作为异步任务来执行
        // $orderService = app(OrderService::class);
        // // 查询出所有参与了此众筹的订单
        // Order::query()
        //     // 订单类型为众筹商品订单
        //     ->where('type', Order::TYPE_CROWDFUNDING)
        //     // 已支付的订单
        //     ->whereNotNull('paid_at')
        //     ->whereHas('items', function ($query) use ($crowdfunding) {
        //         // 包含了当前商品
        //         $query->where('product_id', $crowdfunding->product_id);
        //     })
        //     ->get()
        //     ->each(function (Order $order) {
        //         // todo 调用退款逻辑
        //         $orderService->refundOrder($order);
        //     });
    }
}
