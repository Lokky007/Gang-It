<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 8.8.2015
 * Time: 15:33
 */

class configuration_db
{
    /*
     * Database login details
     * Try login, write fail to error.log
     */
    public static function db_connect($sql)
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wiki";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);


        // Check connection
        if ($conn->connect_error) {
            error_log("---- ERROR ----> ".date('Y-m-d H:i:s')." Database Connection in file 'configuration_db.php'. REASON: Incorrect settings of database.\n $conn->connect_error \n", 3, "error.log");
            die("Connection failed. Problem with database.");
        }
        // Do query and send it back
        else
        {
            $result = $conn->query($sql);
        }

        return $result;

    }
}
