<?php

/**
 * Created by PhpStorm.
 * User: owner
 * Date: 28.11.2015
 * Time: 18:45
 */
class Db_login extends configuration_db
{

    public static function prepare_login_data($users_login, $users_password){

        $sql = "SELECT * FROM `users` WHERE `user_login` = '$users_login' and `user_password`= '$users_password'";

        $result = configuration_db::db_connect($sql);
        return $result;
    }
}