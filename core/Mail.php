<?php

class Mail {
    public static function getMail(){

        $paramsPath = ROOT . '/config/mail_params.php';
        $params = include($paramsPath);

        $adminEmail = $params['adminEmail'];

        return $adminEmail;
    }
}