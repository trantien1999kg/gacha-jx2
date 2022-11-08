<?php

    $result=$db->rawQuery("select id, ten_$lang as name,thongtin_vi as slogan,noibat,phantram,photo from #_baiviet where hienthi=1 and type=? order by stt asc, id desc",array('phan-thuong'));

    $arr=array();

    foreach($result as $row) {
       
        $record=array();

        $record['id']=$row['id'];

        $record['photo']=$row['photo'];

        $record['name']=$row['name'];

        $record['lucky']=$row['noibat'];

        $record['percent']=$row['phantram'] / 1000;

        $arr[]=$record;
    }

    $json_array=json_encode($arr,JSON_UNESCAPED_UNICODE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1369">
    <title>Vòng quay may mắn</title>
    <link rel="stylesheet" href="./assets/css/wheel.css" />
    <script src="assets/js/all.js"></script>
    <script src="assets/js/index.js"></script>
</head>

<body style="background:url('<?=_upload_hinhanh_l.$bannertop["photo"]?>');">
    <main>
        <div class="box__logo__wheel">
            <img src="<?=_upload_hinhanh_l.$logo["photo"]?>" alt="trang chủ">
        </div>

        <div class="inner__wheel">
            <div class="text__header__wheel">
                VÒNG QUAY TỤ BẢO
            </div>
            <div class="main__wheel">
                <div class="arrow__wheel">
                    <img src="images/coquay.png" alt="" />
                </div>
                <ul class="wheel"></ul>
                <div class="btn__wheel btn__start disabled">
                    <img src="images/btn__wheel.png" alt="Quay thưởng" />
                </div>
            </div>
            <div class="box__info__wheel">
                <div class="text__info_customer">
                    THÔNG TIN KHÁCH HÀNG
                </div>
                <div class="box__input__customer">
                    <div class="input__customer">
                        <input type="text" id="fullname" name="fullname" placeholder="" />
                    </div>
                </div>
                <div class="btn__apply btn__default">
                    Quay ngay
                </div>
            </div>
            

        </div>
        <div class="box__bottom__wheel">
                <img src="<?=_upload_hinhanh_l.$bannerbottom["photo"]?>" class="bannerbottom" alt="trang chủ">
            </div>
        <audio controls style="display:none" preload="auto" id="audio">
            <source src="audio/wheel.m4a" type="audio/ogg">
            <source src="audio/wheel.m4a" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </main>
    <script>
    var data = JSON.parse('<?=$json_array?>');
    </script>
    <script src="assets/js/wheel.min.js"></script>
</body>

</html>