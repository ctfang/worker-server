<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/1/5
 * Time: 15:09
 */

namespace system;


use Workerman\Worker;

abstract class WorkerMan
{
    protected $worker;
    protected $socket    = '';
    protected $protocol  = 'http';
    protected $host      = '0.0.0.0';
    protected $port      = '2346';
    protected $processes = 4;

    /**
     * 架构函数
     * @access public
     */
    public function __construct(&$config)
    {
        // 实例化 Websocket 服务
        $this->worker           = new Worker($config['protocol'] . '://' . $config['host'] . ':' . $config['port']);
        // 设置进程数
        $this->worker->count   = $config['processes'];

        // 设置回调
        foreach (['onWorkerStart', 'onConnect', 'onMessage', 'onClose', 'onError', 'onBufferFull', 'onBufferDrain', 'onWorkerStop', 'onWorkerReload'] as $event) {
            if (method_exists($this, $event)) {
                $this->worker->$event = [$this, $event];
            }
        }
    }
}