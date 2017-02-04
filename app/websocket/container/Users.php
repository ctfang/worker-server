<?php
/**
 * Created by PhpStorm.
 * User: selden
 * Date: 2017/2/4
 * Time: 12:00
 */

namespace app\websocket\container;


class Users
{
    private static $_userList;
    /**
     * 过滤，验证
     * @param array $data
     * @return array
     */
    public static function filter($data)
    {
        return $data;
    }

    
    public static function isLogin($connection)
    {
        if( isset($connection->userId) ){
            return true;
        }
        return false;
    }

    public static function login($connection, $data)
    {
        if( !self::filter($data) ){
            return false;
        }
    }
}