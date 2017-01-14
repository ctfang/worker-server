<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/1/14
 * Time: 18:13
 */

namespace app\container;


class Link
{
    protected static $_list;

    /**
     * 链接加入存储
     * @param $key   标识
     * @param $value 引用对象
     */
    public static function push($key,&$value)
    {

    }

    /**
     * 拉取对象
     * @param $key  标识
     */
    public static function pull($key)
    {

    }

    /**
     * 断开链接
     * @param $key  标识
     */
    public static function off($key)
    {

    }
}