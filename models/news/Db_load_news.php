<?php

/**
 * Created by PhpStorm.
 * User: owner
 * Date: 27.11.2015
 * Time: 22:47
 */
//require_once('../../configuration_db.php');

class Db_load_news extends configuration_db
{
    public static function prepare_select_quests(){

        $sql = 'SELECT * FROM `quests` WHERE status = 1';

        $result = configuration_db::db_connect($sql);
        return $result;
    }

}