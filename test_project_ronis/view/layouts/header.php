<!DOCTYPE html>
<html lang="rus">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Siimple - Free Bootstrap 3 Landing Page</title>

    <!-- Bootstrap -->
    <link type="text/css" href="/template/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="/template/css/bootstrap-theme.css" rel="stylesheet">
    <link type="text/css" href="/template/css/flexslider.css" rel="stylesheet">

    <!-- siimple style -->
    <link type="text/css" href="/template/css/style.css" rel="stylesheet">

    <!-- =======================================================
        Theme Name: Siimple
        Theme URL: https://bootstrapmade.com/free-bootstrap-landing-page/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<div class="wrapper">
<header class="header">
    <div class="navbar navbar-inverse ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Siimple</a>
            </div>
            <div class="navbar-collapse collapse">
                <?php if(!isset($_COOKIE['login'])){ ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/user/register">Регистрация</a></li>
                    <li><a href="/user/login">Войти</a></li>
                </ul>
                <?php } else {?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/user/logOut">Выйти</a></li>
                </ul>
                <?php } ?>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
