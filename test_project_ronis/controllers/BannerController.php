<?php

class BannerController{


    public function actionGetBanner(){
        $banner = new Banner();
        $bannerList = $banner->getBanner();
        require_once(ROOT . "/view/banner/banner.php");
        return true;
    }

    public function actionAddBanner(){
        $name = '';
        $url= '';

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $url = "/template/images/".$_FILES["file"]["name"];
            if(isset($_POST['status']) && $_POST['status']=='on'){
                $status =  1;
            }else{
                $status = 0;
            }
            $validChek=true;

            if (!ValideteForm::validLogin( $name)){
                $error['name']="Имя должно быть не короче 2-х символов";
                $validChek=false;
            }
            if ($validChek){
                if(is_uploaded_file($_FILES["file"]["tmp_name"]))
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"], ROOT."/template/images/".$_FILES["file"]["name"]);
                    $banner = new Banner();
                    $banner->addBanner($name,$url,$status);
                    $error['complete']="Баннер успешно добавлен";
                } else {
                    echo("Ошибка загрузки файла");
                }
            }
        }
        require_once(ROOT . "/view/banner/addbanner.php");
        return true;
    }

    public function actionDeleteBanner($parametr){

        $banner = new Banner();
        $bannerList = $banner->deleteBanner($parametr[0]);

        $this->actionGetBanner();
        return true;
    }

    public function actionGetIdBanner($parametr){

        if (isset($_POST['submit'])) {
            $banner = new Banner();
            $id =  $_POST['id'];
            $name = $_POST['name'];
            $validChek=true;
            if (!ValideteForm::validLogin( $name)){
                $error['name']="Имя должно быть не короче 2-х символов";
                $validChek=false;
            }
            $url = "/template/images/".$_FILES["file"]["name"];
            if(isset($_POST['status']) && $_POST['status']=='on'){
                $status =  1;
            }else{
                $status = 0;
            }
            if ($validChek){
                if(is_uploaded_file($_FILES["file"]["tmp_name"]))
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"], ROOT."/template/images/".$_FILES["file"]["name"]);
                } else {
                    $banner->EditBanner($id,$name,$_POST['baseurl'],$status);
                    $error['complete']="Баннер успешно изменен";
                }
            }
        }

        $banner = new Banner();
        $IdBannerList = $banner->GetIdBanner($parametr[0]);
        require_once(ROOT . "/view/banner/editbanner.php");
        return true;
    }

    public function actionSlideBanner($parametr){
        $banner = new Banner();
        $banner->slideBanner($parametr[0],$parametr[1],$parametr[2],$parametr[3]);
        $this->actionGetBanner();
        return true;
    }
}