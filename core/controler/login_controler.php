<?php

/**
 * Created by PhpStorm.
 * User: Lukáš Dočkal
 * Date: 28.11.2015
 * Time: 12:19
 */

class login_controler
{
    public static function check_login_parameters(){

        $username = $_POST['login'];
        $password =$_POST['pass']; // md5($_POST['pass']);
        $result = FALSE; //Default is FALSE, set TRUE if data are correct

        if ((!empty($username)) || (!empty($password))){
            $db_result = Db_login::prepare_login_data($username,$password);

            //If data are correct and found 1 record, go set session for user
            if ($db_result->num_rows == 1) {
                $db_data = $db_result->fetch_array();

                $session_data[0] = $db_data['user_id'];
                $session_data[1] = $db_data['user_nick'];
                $session_data[2] = $db_data['user_password'];

               login_controler::set_user_session($session_data[0],$session_data[1],$session_data[2]);

                $result = TRUE;
            }
        }
        return $result;
    }


    //set session
    private static function set_user_session($id_user, $nick, $pass){

        $_SESSION['id_user'] = $id_user;
        $_SESSION['nick'] = $nick;
        $_SESSION['pass'] = $pass;

        return;
    }



}