<?php
/**
 * 基础文件，自动引入执行
 * User: selden
 * Date: 2017/1/5
 * Time: 15:11
 */
if( php_sapi_name()=='cli' ){
    $config = \system\Config::get();
    if( $classList = \system\Build::isBuild($config) ){
        \system\Build::make($classList);
        echo "Created Successfully\n",
        "Please re-run\n";
    }else{
        \Workerman\Worker::$logFile = ROOT_PATH.'runtime/worker.log';
        foreach ($config as &$arr){
            if( $arr['module'] ){
                $class = '\\app\\'.$arr['module'].'\\Server';
                new $class($arr['worker']);
            }
        }
        // 执行后将永久阻塞
        \Workerman\Worker::runAll();
    }
}else{
    // 非命令行调用

}



