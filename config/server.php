<?php
/**
 * 服务启动
 * User: selden
 * Date: 2016/11/14
 * Time: 9:38
 */
return [
    [
        'module'=>'http/server',
        'worker'=>[
            // 协议类型
            'protocol'=>'http',
            // 主机地址
            'host'=>'0.0.0.0',
            // 端口
            'port'=>12345,
            // 启动进程
            'processes'=>4,
        ],
    ],

];