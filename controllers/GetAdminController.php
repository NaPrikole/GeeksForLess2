<?php

class GetAdminController extends IsAdmin {

    public function index(){

        self::checkAdmin();
        require_once (ROOT . '/views/admin/admin.php');
        return true;
    }

    public function getLogin(){

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $errors = [];

            $adminId = Admin::getAdminData($name, $password);

            if($adminId == false){
                $errors[] = 'Wrong data, please try again';
            } else {
                Admin::getSession($adminId);
                header("Location: /admin");
            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function dieSession(){
        unset($_SESSION['admin']);
        header("Location: /");
    }
}