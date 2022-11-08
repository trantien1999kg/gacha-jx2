<?php

    require_once 'ajaxConfig.php';
    
    @$id=htmlspecialchars($_POST['id']);

    @$name=htmlspecialchars($_POST['name']);

    $currentTime=time();

    $dateNow=date('d/m/Y H:i:s',$currentTime);

    $data['id_list']=$id;

    $data["ten_vi"]=$name;

    $data['ngaytao']=$currentTime;

    $data['type']='thong-ke';

    $db->insert('baiviet',$data);

    $result=$db->rawQueryOne("select id,ten_vi as name,thongtin_vi as slogan,noibat, photo from #_baiviet where hienthi=1 and id='$id' and type='phan-thuong' limit 1");
    
    $array_list=[

        'id'=>$result['id'],

        'name'=>$result['name'],

        'lucky'=>$result['noibat'],

        'photo'=>$result['photo'],

        'slogan'=>$result['slogan'],

        'date' =>$currentTime

    ];
    echo json_encode($array_list);
?>