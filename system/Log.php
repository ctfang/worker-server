<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/1/14
 * Time: 14:03
 */

namespace system;


class Log
{
    /**
     * 检查目录
     * @param $path
     */
    private static function makeDir($path)
    {
        if( !is_dir($path) ){
            mkdir($path,0755,true);
        }
    }

    /**
     * 转换字符串
     * @param $data
     * @return mixed
     */
    private static function toString($data)
    {
        if(  is_array($data) ){
            $string = json_encode($data,320)."\n";// 不转义
            return str_replace(array('{','}',"\",",'\\\\'),array("{\n","\n}\n","\",\n",'\\'),$string);
        }elseif( is_object($data) ){
            $string = serialize($data);
            return str_replace(array('{','}',"\",",'\\\\'),array("{\n","\n}\n","\",\n",'\\'),$string);
        }else{
            return $data;
        }
    }

    /**
     * 业务性日记
     * @param $data
     */
    public static function top( $data )
    {
        $string = self::toString($data);
        $path   = ROOT_PATH.'runtime/top_log/';
        self::makeDir( $path );
        $file   = $path.date('Y-m-d').'.log';
        error_log($string,3,$file);
    }

    /**
     * 错误日记
     * @param $data
     */
    public static function err( $data )
    {
        $debugInfo  = debug_backtrace();
        $string     = '调用信息.' . $debugInfo[0]['file'] . ' (' . $debugInfo[0]['line'] . ')' . PHP_EOL."\n";
        $string     = $string.self::toString($data);
        $path       = ROOT_PATH . 'runtime/err_log/';
        self::makeDir($path);
        $file       = $path . date('Y-m-d') . '.log';
        error_log($string,3,$file);
    }
}