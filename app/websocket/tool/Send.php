<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/2/4
 * Time: 12:24
 */

namespace app\websocket\tool;


class Send
{
    public static function error($string='默认错误信息',$code=4000)
    {
        return json_encode(array('code'=>$code,'data'=>$string));
    }

    public static function success($string='OK',$code=0)
    {
        return json_encode(array('code'=>$code,'data'=>$string));
    }
}