<?php
// 启动 session
session_start();

header('content-type:text/html;charset=utf-8');
$username = isset($_POST['username'])?$_POST['username']:'';
$password = isset($_POST['password'])?$_POST['password']:'';

$conn = mysqli_connect('localhost','root','123456','test');
$sql_select = "SELECT username FROM t_user WHERE username='$username' AND password='$password'";
$res = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($res);

if(empty($row) || $username=='$row[0]' || $password=='$row[1]'){
    echo "<script>
            alert('用户名或密码输入错误');
            window.location.href='../login.html';
          </script>";
}else{
    // 获取输入的验证码，并转为大写
    $ucode = strtoupper($_POST['code']);
    // 获取 session 中保存的图片显示的验证码
    $scode = strtoupper($_SESSION['code']);
    // 比较两者是否相同，不同则提示错误信息，并跳转到登录页面重新登录
    if ($ucode != $scode) {
        echo '<script>
   			alert("验证码错误！");
   			location.href="../login.html";
		</script>';
    }else{
        //将用户添加到 session 中，并跳转到主页
        $_SESSION['user'] = $username;
        header('Location:./main.php');
        //  echo '登录成功';
    }
}

