<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/2/4
 * Time: 13:40
 */

namespace app\websocket\controller;


use app\websocket\tool\Route;
use app\websocket\tool\Send;

class Help
{
    public function lists($data,$connection)
    {
        $connection->send(Send::success(Route::lists()));
    }
}