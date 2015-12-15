<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 14.11.2015
 * Time: 20:09
 */

class page_controler extends configuration_db{

    // Zero - page is available for all
    public static function checkUserAccess($requiredAccess){
        // set 0(classic user) session ID if not isset
        if (empty($_SESSION['id_user'])){$_SESSION['id_user'] = 0;};

        $sql = 'select * from users WHERE user_id = ' . $_SESSION['id_user'];

        $sql_result = configuration_db::db_connect($sql);
        $result = $sql_result->fetch_assoc();

        return ($requiredAccess == $result['user_rights'] or $requiredAccess == 0) ? true : false;
    }
}
