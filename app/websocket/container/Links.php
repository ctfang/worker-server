<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/1/14
 * Time: 18:13
 */

namespace app\websocket\container;


class Links
{
    protected static $_list;

    /**
     * 链接加入存储
     * @param $key   标识
     * @param $value 引用对象
     */
    public static function push($key,$value)
    {
        self::$_list[$key] = $value;
    }

    /**
     * 拉取对象
     * @param $key  标识
     * @return bool
     */
    public static function pull($key)
    {
        if(isset(self::$_list[$key])){
            return self::$_list[$key];
        }
        return false;
    }

    /**
     * 断开链接
     * @param $key  标识
     */
    public static function off($key)
    {
        if(isset(self::$_list[$key])){
            unset(self::$_list[$key]);
        }
    }
}