<?php

return [
    'alipay' => [
        'app_id'         => '2016091600525334',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv2qJ5VUhW+xEyaw5G6DrL2fGo5I19zdsytraxsqfwwrJlpVkd3P7UL12afxc6UDC1Fp5I3fYPpDg21O6jeTuVbfGBG+HBOQ7hgz3k8BabGCnFUPBLCfFrls48YPms5IG7/z7lz+0VePA8mDz5wQTWBtM0VZ2iv1tcDkTBjjEPqk7zE1ZdwYwkkOpsnJwtnlsBY1TQMb9dGqXwDXw5/V3cl5xgxGxHOKpj9BY3kYURYmiGkewUkrhgKrVkpk2f36yzKWEq8luHVtH7hCW1Sll1LvS40rdw2s27/vLr8OzxxyLzb7l40+JYJUgLpcFnb2NjMPUgOE6VvGDotTHGoxBDQIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEApwZM6VZOfUR+dOnhxwuPTOxfbAyKRAG3fpTkkcASx9VM+OTenhErdh7054HO+P2o0b1x+9gZv3fIurt8GAUIXmVrOEy2Hw25l7UQuKzSMWY4YX8LMeCkL5j/w5hx+RmnP1mJ+QwcW6QA4LIIw3mJss2z3fzeo1GhXFNskR6CS244RNtAVqL0elPh8aJF22YXTJ1aE5xjtotkcMbgx0ram0eTC8XVCLwYS4PhT45+1ccFQ7feElC7uKVcTpJvS51yxXjOnFZi3VCiNo2qx+i6PnrjD6hX7SNZUbBn6UxsW9gBAfJVq4c1s+oR2mF9xBLAMwLiJoDdmE58njJxq9ECbwIDAQABAoIBACPIxMelNxG9j/5KcZXskxoe9l623RSu7XpQOhxD84Ie3+vfVRa2hQI8panH9OkBp56wIPCdHv8Xkcj4DCE1StK2ld8tCEPk8+Nd5qQ6Wpo81U2GI4bfIy4TcJCeY6TD60I2U8oo3xZ/L7T0T85ZhrfpPGUOHUEOZyzZrsP0rmOsc9TSBgEUoNSI+3xdy/EeKNBQq3rRizcENwsj/KfhXINHPwWzyaI58uFjvBtUkWtZfe/6opvgc23Vzh6/rdwz30MlAuAH3bkpUxb9OnLpW29AsYG69ggCFDUZdYFNENGx1VS/2bdEALZWjssnLCZ3wNvwxgn0LjZfaNTGxnoLZVkCgYEA3K/x52NxaSQMvF8pKGutPkppQKOzEFfj7di4C5nH4Nryv0Ar0BOTXLDpRq3uC/7zdThOLvX0qrvdHPwfHZuEdfGVoY14vZwXbdoGzLAN5NLRGG71DtT8NOxIb2/UHaD2oLwRYYTwbfphXyTpp2t7/FYF4asrCK9hvO0+Tvu/9L0CgYEAwcApRe6IYu5kwXO/Gm389wKmh3XWJQf89BlJvrx4jsnxtgEwnLklW59xR9GoF63XfuEfI7vM2I2dkPl6+9ouxEn5IJrJDChRNkB6ztkxoaXbxUvSAuaFw5RJmk8WbytvUG/KoP2y8xMyEu0TyoBo+k9+c6RfSo2NIoHLN7HWZJsCgYACQ0uXs81V5qi6xb8GSxRbryelIgiUAlKz/aTleY4zIAudKmtIlurL6IR71Qy70sFsUkd688qudX6u7WbkRtP04aVHIsw6JX+YAMRRFP0Pe5npRjn9DPIJGOMlQWBLbXsZ6tPCzDoq5oZZE2fR76g1ziwBRGAMlr/J0CTzamFtgQKBgQCj/fExRt/b1OolL8IuLbBypqSrfVq/R06ckZbwwXfNbDKRmdo6nR94uLDaWCPNvw/qTcPcrAWLufoHDpNA/wCclfwu07Sd/LYYlGUeFYpDxy4Ihc+BMvs/epD98jkL6ZizXZwFvhasVbAJgu9AdIXmcEiYuyUI5lzyOyf1wSm1RwKBgQCLPImEG7HH/Ni6KUkJsDM1OyfFy1YUHlK2OyUN3VFD4onGDv5TOgkv9EtTg87Kw5s78ceY5eCl/XPUpX8VPH3xjfHxmuw+4LtU/DeoB1/7Yp+0Gnv+vadYWYjr04AzIYq6li0E0fQiZWhtK2s8zHM6SzuFnurfmKfzzKXoE86gYA==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
