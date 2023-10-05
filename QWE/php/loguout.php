<?php
    session_start();                // 启动 session
    $_SESSION['user'] = [];     //删除所有数据
    session_destroy();              //结束当前会话
    header("Location:../login.html");        //跳转到登录页面



