
<?php include_once (ROOT.'/view/layouts/header.php')?>


<div class="content">
    <div class="container">
        <div class="row">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Url</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                <?php   $cont= count($bannerList)-1;
                        for ($i=0;$i<=$cont;$i++){ ?>
                <tr>
                    <td><?php echo $bannerList[$i]['name'] ?></td>
                    <td><?php echo $bannerList[$i]['url'] ?></td>
                    <td><?php echo $bannerList[$i]['status'] ?></td>
                    <?php if(!($i==0 || $i==$cont)){?>
                        <td><a href="/banner/SlideBanner/<?php echo $bannerList[$i]['id'] ?>/<?php echo $bannerList[$i]['position'] ?>/<?php echo $bannerList[$i-1]['id'] ?>/<?php echo $bannerList[$i-1]['position']?>"> <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></td>
                        <td><a href="/banner/SlideBanner/<?php echo $bannerList[$i]['id'] ?>/<?php echo $bannerList[$i]['position'] ?>/<?php echo $bannerList[$i+1]['id'] ?>/<?php echo $bannerList[$i+1]['position']?>"> <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a></td>

                    <?php }else{ ?>
                        <td></td>
                        <td></td>
                    <?php } ?>
                    <td><a href="/banner/GetIdBanner/<?php echo $bannerList[$i]['id'] ?>">Редактировать баннер</a></td>
                    <td><a href="/banner/deleteBanner/<?php echo $bannerList[$i]['id'] ?>">Удалить баннер</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once (ROOT.'/view/layouts/footer.php')?>
