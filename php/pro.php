<?php
$name = $_POST['name'];
$touch = $_POST['touch'];
$cont = $_POST['content'];

$message['name'] = $name;
$message['touch'] = $touch;
$message['content'] = $cont;
$message['time'] = date('Y-d-m H:i:s');
//序列化数组
$data = serialize($message);

// 允许上传的图片后缀
$file_type = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);

$filename = $temp[0].'.dat';       //创建文件名

$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 1050000)          //图片大小小于1MB
    && in_array($extension, $file_type))
{
    //$_FILES["file"]["error"]上传文件的错误代码（0为没有错误）
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    } else
    {
        if(preg_match('/^[a-zA-Z]{4,12}$/',$name)){
            if(preg_match('/^1[345789]\d{9}$/im',$touch)||
                preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',$touch)){
                if (file_exists("../Tang/" . $_FILES["file"]["name"]) || file_exists("../Tang/" . $filename))
                {
                    //file_exists检查文件或目录是否存在
                    //检查文件是否存在
                    echo "<script>
                alert('文件已存在，请勿重复提交。');
                window.history.back();
                </script>";
                }else {
                    //写入文件$filename
                    file_put_contents("../Tang/".$filename,$data);
                    // 将文件存入Tang目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../Tang/" . $_FILES["file"]["name"]);
                    echo "<script>
                alert('提交成功,\\n确认后返回首页。');
                window.location.href='../index.html';
                </script>";
                }

            } else{
                echo "<script>
                alert('手机号或邮箱输入不正确');
                window.history.back();
                </script>";
            }
        }else{
            echo "<script>
            alert('用户名输入不正确（格式为大小写字母，4~12个字符）');
            window.history.back();
            </script>";
        }
    }
}else{
    echo "<script>
            alert('文件过大或文件格式错误');
            window.history.back();
            </script>";
}

