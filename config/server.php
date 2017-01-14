<?php
/**
 * 服务启动
 * User: selden
 * Date: 2016/11/14
 * Time: 9:38
 */
return [
    // 默认服务
    [
        // 模块服务
        'module'=>'websocket',
        // 服务配置
        'worker'=>[
            // 协议类型
            'protocol'=>'websocket',
            // 主机地址
            'host'=>'0.0.0.0',
            // 端口
            'port'=>12345,
            // 启动进程
            'processes'=>4,
        ],
    ],
//    [
//        // 模块服务
//        'module'=>'tcp',
//        // 服务配置
//        'worker'=>[
//            // 协议类型
//            'protocol'=>'tcp',
//            // 主机地址
//            'host'=>'0.0.0.0',
//            // 端口
//            'port'=>23456,
//            // 启动进程
//            'processes'=>4,
//        ],
//    ],
//    [
//        // 模块服务
//        'module'=>'websocket',
//        // 服务配置
//        'worker'=>[
//            // 协议类型
//            'protocol'=>'websocket',
//            // 主机地址
//            'host'=>'0.0.0.0',
//            // 端口
//            'port'=>34567,
//            // 启动进程
//            'processes'=>4,
//        ],
//    ],
];
