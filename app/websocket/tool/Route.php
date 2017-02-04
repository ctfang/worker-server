<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/2/4
 * Time: 12:36
 */

namespace app\websocket\tool;


use app\websocket\controller;

class Route
{
    private static $_routeList;
    private static $_classList;

    /**
     * 初始化路由
     */
    public static function main()
    {
        require dirname(__DIR__).'/web.php';
    }

    /**
     * 注册路由
     *
     * @param $key
     * @param $model
     */
    public static function register($key,$model)
    {
        $arr    = explode('@',$model);
        $class  = "\\app\\websocket\\controller\\".$arr[0];
        if( !isset(self::$_classList[$class]) ){
            self::$_classList[$class] = new $class;
        }
        $class  = self::$_classList[$class];
        $fun    = $arr[1];
        self::$_routeList[$key] = function ($data,$connection) use ($class,$fun){
            $class->$fun($data,$connection);
        };
    }

    /**
     * 执行
     *
     * @param $key
     * @param $data
     */
    public static function run($key,$data,$connection)
    {
        $fun = self::$_routeList[$key];
        $fun($data,$connection);
    }

    public static function lists()
    {
        return array_keys(self::$_routeList);
    }
}