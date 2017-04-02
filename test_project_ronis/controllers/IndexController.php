<?php

class IndexController{

    public function actionIndex(){
        $banner = new Banner();
        $bannerList = $banner->getBanner();
        require_once(ROOT . "/view/site/index.php");
        return true;
    }

}

?>