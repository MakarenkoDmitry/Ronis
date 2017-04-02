<?php
class User
{
    public function addUser($login,$email,$password){
        $db = Db::getConnection();
        $result = $db->query("INSERT INTO user(login, email, password) VALUES ('$login','$email','$password')");
        if ($result){
            return true;
        }
        return false;
    }

    public function loginUser($login,$password){
        $db = Db::getConnection();
        $result = $db->query("SELECT COUNT(*) as 'count' FROM user WHERE login='$login' AND password='$password'");
        $result->execute();
        $row=$result->fetch();
        if ($row['count']==1) {
            return true;
        }
        return false;
    }
}