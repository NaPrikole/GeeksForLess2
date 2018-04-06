<?php

class Admin {

    public static function getAdminData($name, $password){

        $db = DataBase::setConnection();

        $sql = 'SELECT * FROM users WHERE name = :name AND password = :password';

        $response = $db->prepare($sql);
        $response->bindParam(':name', $name, PDO::PARAM_INT);
        $response->bindParam(':password', $password, PDO::PARAM_INT);
        $response->execute();

        $admin = $response->fetch();

        if($admin){
            return $admin['id'];
        }
        return false;
     }

    public static function getSession($adminId){
        $_SESSION['admin'] = $adminId;
    }

    public static function checkSession(){
        if(isset($_SESSION['admin'])){
            return $_SESSION['admin'];
        }
        header("Location: /user/login");
    }

    public static function getAdmin($id){

        $db = DataBase::setConnection();

        $sql = 'SELECT * FROM users WHERE id = :id';

        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_ASSOC);
        $response->execute();
        return $response->fetch();
    }
}