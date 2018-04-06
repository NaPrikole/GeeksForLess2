<?php

abstract class IsAdmin {

    public static function checkAdmin(){

        $getId = Admin::checkSession();
        $admin = Admin::getAdmin($getId);
        if($admin['is_admin'] == 1){
            return true;
        } else {
            die('Don\'t fool kid - :)');
        }

    }
}