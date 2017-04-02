<?php

class ValideteForm{

    public static function validLogin($log){
        if (strlen($log)>=2){
            return true;
        }

        return false;
    }

    public static function login_comparison($login){
        $db = Db::getConnection();
        $result = $db->prepare("SELECT COUNT(*)as'count' FROM user WHERE login='$login'");
        $result->execute();
        $row=$result->fetch();
        if ($row['count']==0) {
            return true;
        }
        return false;
    }

    public static function validEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function email_comparison($email){
        $db = Db::getConnection();
        $result = $db->prepare("SELECT COUNT(*)as'count' FROM user WHERE email='$email'");
        $result->execute();
        $row=$result->fetch();
        if ($row['count']==0) {
            return true;
        }
        return false;
    }

    public static function validPassword($pass){
        if (strlen($pass)>=6){
            return true;
        }

        return false;
    }
}


