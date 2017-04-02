<?php

class Banner
{
    public function getBanner(){
        $db = Db::getConnection();
        $bannerList = array();
        $i = 0;
        $result = $db->query('SELECT * FROM banner ORDER by position');
        while ($row = $result->fetch()){
            $bannerList[$i]['id'] = $row['id'];
            $bannerList[$i]['name'] = $row['name'];
            $bannerList[$i]['url'] = $row['url'];
            $bannerList[$i]['status'] = $row['status'];
            $bannerList[$i]['position'] = $row['position'];
            $i++;
        }

        return $bannerList;
    }

    public function addBanner($name,$url,$status){
        $db = Db::getConnection();
        $result = $db->query("SELECT COUNT(*) as 'count' FROM banner");
        $result->execute();
        $row=$result->fetch();
        $position = $row['count'];
        $result = $db->query("INSERT INTO banner(name, url, status,position) VALUES ('$name','$url', $status, $position)");
        if ($result){
            return true;
        }

        return false;
    }

    public function deleteBanner($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT id,url FROM banner WHERE id=$id");
        $result->execute();
        $row=$result->fetch();
        $url = $row['url'];
        if(file_exists(ROOT.$url)){
            unlink(ROOT.$url);
        }
        $result = $db->query("DELETE FROM banner WHERE id=$id");

        return true;

    }

    public function slideBanner($id_from,$position_from,$id_to,$position_to){
        $db = Db::getConnection();
        $result = $db->query("UPDATE banner SET position='$position_from'  WHERE id=$id_to");
        $result = $db->query("UPDATE banner SET position='$position_to'  WHERE id=$id_from");

        return true;

    }

    public function GetIdBanner($id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM banner WHERE id=$id");
        $result->execute();
        $row=$result->fetch();
        $IdBannerList = array();
        $IdBannerList['id'] = $row['id'];
        $IdBannerList['name'] = $row['name'];
        $IdBannerList['url'] = $row['url'];
        $IdBannerList['status'] = $row['status'];

        return $IdBannerList;
    }

    public function EditBanner($id,$name,$url,$status){
        $db = Db::getConnection();
        $result = $db->query("UPDATE banner SET name='$name',url='$url', status=$status  WHERE id=$id");

        return true;
    }

}