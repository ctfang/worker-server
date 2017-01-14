<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/1/13
 * Time: 18:18
 */

namespace system;


class Build
{
    public static function make($list)
    {
        $template = file_get_contents( __DIR__.'/template/Server.temp' );
        foreach ($list as &$name){
            $file = APP_PATH.$name.'/Server.php';
            $sreverString = str_replace(['[module]'],[$name],$template);
            if( !file_exists($file) ){
                if( !file_exists(dirname($file)) ){
                    mkdir(dirname($file),0755,true);
                }
                file_put_contents($file,$sreverString);
            }
        }
    }

    public static function isBuild(&$config)
    {
        $list = [];
        // 文件检测
        foreach ($config as &$arr){
            $file = APP_PATH.$arr['module'].'/Server.php';
            if( !file_exists($file) ){
                $list[] = $arr['module'];
            }
        }
        return $list;
    }
}