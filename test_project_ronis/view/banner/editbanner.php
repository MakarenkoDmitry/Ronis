<?php include_once (ROOT.'/view/layouts/header.php')?>


<div class="content">
    <div class="container">
        <div class="row">
            <?php if (isset($error) && isset($error['complete'])){
                ?>
                <h2><?php  echo $error['complete'] ?></h2>
                <?php
            }else{?>
                <form action="#" method="post" class="clearfix form-reg" enctype="multipart/form-data">
                    <h2>Добавить баннер</h2>
                    <div class="form-group row">
                        <label for="name-input" class="col-2 col-form-label">Имя</label>
                        <div class="col-10">
                            <input name="name"  class="form-control" value="<?php echo $IdBannerList['name'] ?>" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-10">
                            <label for="status-input" class="col-2 col-form-label">Статус</label>
                            <input style="width: 34px;" name="status"  class="form-control" type="checkbox"<?php if ($IdBannerList['status']==1) {?>checked <?php }?> >
                            <input name="id" type="text" value="<?php echo $IdBannerList['id']; ?>" hidden>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file-input" class="col-2 col-form-label">Загрузить файл</label>
                        <div class="col-10">
                            <input name="baseurl" type="text" value="<?php echo $IdBannerList['url']; ?>" hidden>
                            <input name="file"  class="form-control"  type="file">
                        </div>
                    </div>

                    <input class="btn btn-primary pull-right" name="submit" type="submit" value="Загрузить">
                </form>
            <?php } ?>
        </div>
    </div>
</div>



<?php include_once (ROOT.'/view/layouts/footer.php')?>
