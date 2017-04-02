<?php
class UserController
{

    public function actionRegister(){
        $login = "";
        $email = "";
        $password = "";

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $error=array();
            $validChek=true;

            if (!ValideteForm::validLogin($login)){
                $error['login']="Логин должен быть не короче 2-х символов";
                $validChek=false;
            }else if (!ValideteForm::login_comparison($login)){
                $error['login']="Такой login уже используется в данном сервисе!";
                $validChek=false;
            }
            if (!ValideteForm::validEmail($email)){
                $error['email']="Некоректный email";
                $validChek=false;
            }else if (!ValideteForm::email_comparison($email)){
                $error['email']="Такой email уже используется в данном сервисе!";
                $validChek=false;
            }
            if (!ValideteForm::validPassword($password)){
                $error['password']="Пароль должен быть не короче 6-х символов";
                $validChek=false;
            }
            if ($validChek){
                $user = new User();
                if ( $user->addUser($login,$email,$password)){
                    $error['complete']="Пользователь успешно добавлен!";
                }
            }
        }
        require_once (ROOT.'/view/user/register.php');
        return true;
    }

    public function actionLogin(){
        $login = "";
        $password = "";

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $error=array();
            $validChek=true;
            if (!ValideteForm::validLogin($login)){
                $error['login']="Логин должен быть не короче 2-х символов";
                $validChek=false;
            }
            if (!ValideteForm::validPassword($password)){
                $error['password']="Пароль должен быть не короче 6-х символов";
                $validChek=false;
            }
            if ($validChek){
                $user = new User();
                if ($user->loginUser($login,$password)){
                    $error['complete']="Вход выполнен успешно!";
                    setcookie("login","admin",time()+86400,'/', 'localhost');
                }else{
                    $error['false']="Пользователь с такими данными не существует!";
                }
            }
        }
        require_once (ROOT.'/view/user/login.php');
        return true;
    }

    public function actionLogOut(){
        setcookie("login","admin",time(),'/', 'localhost');
        $banner = new Banner();
        $bannerList = $banner->getBanner();
        require_once (ROOT.'/view/site/index.php');
        return true;
    }
}
?>