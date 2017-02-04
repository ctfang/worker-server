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
        $connection->userId = $data['name'];
        return self::addCon($connection);
    }

    /**
     * 加入用户连接
     *
     * @param $connection
     * @return bool
     */
    public static function addCon($connection)
    {
        if( isset(self::$_userList[$connection->userId]['linkNum']) ){
            ++self::$_userList[$connection->userId]['linkNum'];
        }else{
            self::$_userList[$connection->userId]['linkNum']  = 1;
        }

        self::$_userList[$connection->userId]['link'][$connection->linkId]   = $connection;

        return true;
    }

    /**
     * 删除用户某个连接
     * 
     * @param $connection
     * @return bool
     */
    public static function delCon($connection)
    {
        --self::$_userList[$connection->userId]['linkNum'];

        unset(self::$_userList[$connection->userId]['link'][$connection->linkId]);

        return true;
    }

    /**
     * 用户推出
     *
     * @param $connection
     */
    public static function logout($connection)
    {
        unset(self::$_userList[$connection->userId]);
    }
}