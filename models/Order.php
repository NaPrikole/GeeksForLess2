<?php

class Order {

    public static function send_mail($message){

        $mail_to = Mail::getMail();
        $subject = "Order from...";


        mail($mail_to, $subject, $message);
    }
}