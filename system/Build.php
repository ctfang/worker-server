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
    public static function main()
    {

    }

    public static function isBuild()
    {
        $config = \system\Config::get();
        // 文件检测
        foreach ($config as &$arr){
            $file = APP_PATH.$arr['module'].'/Server.php';
            if( 1 ){

            }
        }
    }
}