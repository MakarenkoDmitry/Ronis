<?php include_once (ROOT.'/view/layouts/header.php')?>


<div class="content">
    <div class="container">
        <div class="row">
            <?php if (isset($error) && isset($error['complete'])){
                ?>
                <h2><?php  echo $error['complete'] ?></h2>
            <?php
            }else{?>
            <form action="#" method="post" class="clearfix form-reg">
                <h2>Регистрация</h2>
                <div class="form-group row">
                    <label for="login-input" class="col-2 col-form-label">Логин</label>
                    <div class="col-10">
                        <input name="login"  class="form-control" value="<?php echo $login ?>" type="text">
                        <?php if (isset($error) && isset($error['login'])){
                            echo '<span class="label label-warning">'.$error['login']."</span>";
                        }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email-input" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input name="email" class="form-control" value="<?php echo $email ?>" type="email">
                        <?php if (isset($error) && isset($error['email'])){
                            echo '<span class="label label-warning">'.$error['email']."</span>";
                        }?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-input" class="col-2 col-form-label">Пароль</label>
                    <div class="col-10">
                        <input name="password" class="form-control" value="<?php echo $password ?>" type="password" >
                        <?php if (isset($error) && isset($error['password'])){
                            echo '<span class="label label-warning">'.$error['password']."</span>";
                        }?>
                    </div>
                </div>
                <input class="btn btn-primary pull-right" name="submit" type="submit" value="Регистрация">
            </form>
            <?php }?>
        </div>
    </div>
</div>



<?php include_once (ROOT.'/view/layouts/footer.php')?>
