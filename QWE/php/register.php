<?php
header('content-type:text/html;charset=utf-8');
$username = isset($_POST['username'])?$_POST['username']:'';
$password = isset($_POST['password'])?$_POST['password']:'';
$confirm_psd = isset($_POST['confirm_psd'])?$_POST['confirm_psd']:'';
$phone = isset($_POST['phone'])?$_POST['phone']:'';
$email = isset($_POST['email'])?$_POST['email']:'';

if($username=='' || $password=='' || $confirm_psd=='' || $phone=='' || $email==''){
    echo "<script>alert('用户每项信息不能为空！');window.history.back();</script>";die;
}
//判断两次密码是否相同
if($password == $confirm_psd){
    //连接数据库
    $conn = mysqli_connect('localhost','root','123456','test');
    $sql_select = "SELECT username FROM t_user WHERE username='$username'";
    $res = mysqli_query($conn,$sql_select);
    $row = mysqli_fetch_assoc($res);
    if($username == $row['username']){
        echo "<script>
            alert('用户名已存在');
            window.history.back();
          </script>";
    }else{
        if(preg_match('/^1[345789]\d{9}$/im',$phone)) {
            //用户名不存在
            //添加语句
            $sql_insert = "INSERT INTO t_user(username,password,phone,email) 
                        VALUES 
                            ('$username','$password','$phone','$email')";
            $res = mysqli_query($conn, $sql_insert);
            echo "<script>
            alert('注册成功');
            window.location.href='../login.html';
          </script>";
        }else{
            echo "<script>
                alert('手机号格式错误');
                window.history.back();
                </script>";
        }
    }
}else{
    echo "<script>
            alert('两次密码不一致');
            window.history.back();
          </script>";
}
