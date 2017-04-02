<?php include_once (ROOT.'/view/layouts/header.php')?>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($bannerList as $bannerList): ?>
                        <?php if ($bannerList['status']==1){ ?>
                            <li>
                                <img src="<?php echo $bannerList['url']; ?>" alt="">
                            </li>
                    <?php } endforeach; ?>
                </ul>
            </div>
            <a href="/banner/addBanner">Добавить банер</a>
            <a href="/banner/getBanner">Список баннеров</a>
        </div>
    </div>
</div>



<?php include_once (ROOT.'/view/layouts/footer.php')?>
