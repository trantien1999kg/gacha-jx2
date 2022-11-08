<?php
    require_once 'ajaxConfig.php';
    @$email = htmlspecialchars($_POST['email']);
    $checkEmail=$db->rawQueryOne("select id from #_newsletter where email=? and type=? limit 0,1",array($email,'client'));
    if(!empty($checkEmail)){
        $response['status']=201;
        $response['message']='Email của bạn đã có trong hệ thống!';
    }else{
        $data['email']=$email;
        $data['type']='client';
        $data['ngaytao']=time();
        $data['hienthi']=1;
        $insert=$db->insert('newsletter',$data);
        if($insert){
            $response['status']=200;
            $response['message']='Thêm dữ liệu thành công';
        }else{
            $response['status']=201;
            $response['message']='Thêm dữ liệu không thành công';
        }
    }
    echo json_encode($response);
?>