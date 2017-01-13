<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/1/5
 * Time: 15:05
 */

namespace system;


class Config
{
    public static $configList;
    /**
     * @param $file
     * @return bool|mixed
     */
    public static function getFile($file){
        $path   = './config/'.$file.'.php';
        if( !file_exists($path) ){
            return false;
        }
        return include $path;
    }
    /**
     * @param $name
     * @param $file
     * @return bool
     */
    public static function get($name=false, $file='server')
    {
        if( !isset(self::$configList[$file]) ){
            self::$configList[$file] = self::getFile($file);
        }
        if( $name===false ){
            return self::$configList[$file];
        }
        return self::$configList[$file][$name];
    }
}