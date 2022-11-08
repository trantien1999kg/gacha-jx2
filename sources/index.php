<?php  if(!defined('_source')) die("Error");


    $about=$db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota,photo from #_info where type=? limit 0,1",array('gioi-thieu'));
    
    $bg_main =$db->rawQueryOne("select photo_$lang from #_bannerqc where hienthi=1 and type=? limit 0,1",array('bg_main'));

    $bg_danhmuc =$db->rawQueryOne("select photo_$lang from #_bannerqc where hienthi=1 and type=? limit 0,1",array('bg_danhmuc'));

    $bg_noibat =$db->rawQueryOne("select photo_$lang from #_bannerqc where hienthi=1 and type=? limit 0,1",array('bg_noibat'));

    $bg_combo =$db->rawQueryOne("select photo_$lang from #_bannerqc where hienthi=1 and type=? limit 0,1",array('bg_combo'));

    $bg_product =$db->rawQueryOne("select photo_$lang from #_bannerqc where hienthi=1 and type=? limit 0,1",array('bg_product'));

    $camketkt=$db->rawQuery("select id, ten_$lang as ten, photo from #_baiviet where hienthi=1 and type=? order by stt asc, id desc limit 0,3",array('bai-viet-about'));

    $camnang=$db->rawQuery("select id, ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,mota_$lang as mota, photo, type from #_baiviet where hienthi=1 and type=? order by stt asc, id desc",array('cam-nang'));

    $combo_i = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,photo,giaban,type from #_baiviet where hienthi=1 and combo<>0 and type=? order by stt asc,id desc",array('san-pham'));

    $menuofhanoi = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,photo,giaban,type from #_baiviet where hienthi=1 and type=? order by stt asc,id desc limit 0,8",array('san-pham'));

    $menunoibat = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,photo,giaban,type from #_baiviet where hienthi=1 and noibat<>0 and type=? order by stt asc,id desc",array('san-pham'));

    $list_c1_index = $db->rawQuery("select id, ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,photo,type from #_baiviet_list where hienthi=1 and type=? order by stt asc,id asc",array('san-pham'));
    
    /* SEO */
    $seoDB = $seo->getSeoDB(0,'setting','capnhat','');

    $seopageIndex = $db->rawQueryOne("select mota_$lang from #_seopage where type = ? limit 0,1",array('dich-vu'));

    if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('h1',$seoDB['title_'.$seolang]);

    if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('title',$seoDB['title_'.$seolang]);

    if(!empty($seoDB['keywords_'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords_'.$seolang]);

    if(!empty($seoDB['description_'.$seolang])) $seo->setSeo('description',$seoDB['description_'.$seolang]);

    $seo->setSeo('url',$func->getCurrentPageURL());

    $seo->setSeo('type',$obj_type);

    $seo->setSeo('dichvu',$seopageIndex['mota_'.$lang]);

    $img_json_bar = (isset($seoPage['options']) && $seoPage['options'] != '') ? json_decode($seoPage['options'],true) : null;

    if($img_json_bar == null || ($img_json_bar['p'] != $seoPage['photo_'.$lang]))

    {

        $img_json_bar = $func->getImgSize($seoPage['photo_'.$lang],_upload_hinhanh_l.$seoPage['photo_'.$lang]);

        $seo->updateSeoDB(json_encode($img_json_bar),'photo',$seoPage['id']);

    }

    if(count($img_json_bar) > 0)

    {

        $seo->setSeo('photo',$https_config._upload_hinhanh_l.$seoPage['photo_'.$lang]);

        $seo->setSeo('photo:width',$img_json_bar['w']);

        $seo->setSeo('photo:height',$img_json_bar['h']);

        $seo->setSeo('photo:type',$img_json_bar['m']);

    }



?>