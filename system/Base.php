<?php
/**
 * 基础文件，自动引入执行
 * User: selden
 * Date: 2017/1/5
 * Time: 15:11
 */
if( php_sapi_name()=='cli' ){
    $config = \system\Config::get();
    if( !\system\Build::isBuild($config) ){
        \system\Build::main($config);
        die("build success");
    }else{
        foreach ($config as &$arr){
            $class = "";
            \app\test\server::class;
        }
    }
}else{

}



