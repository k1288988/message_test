<?php
if(empty($_POST['u_name']) || empty($_POST['u_pass']) || empty($_POST['u_msg'])){
	die('都要填寫');
}
date_default_timezone_set("Asia/Taipei");

$net = "localhost"; // 網址
$userName = "root"; // 使用者
$password = ""; // 密碼
$datebase = ""; //連接資料庫
$link = mysqli_connect($net, $userName, $password,  $datebase, 3306); 
if(!$link){
    die("連接失敗：" . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");

$uname = $_POST['u_name'];
$upass = $_POST['u_pass'];
$umsg = $_POST['u_msg'];
$utime = date("Y-m-d H:i:s",time());
$sql = "INSERT INTO `Message` (`u_name`, `u_pass`, `u_msg`, `u_time`)
VALUES('$uname', '$upass' , '$umsg', '$utime');";
mysqli_query($link , $sql);

mysqli_close($link);

echo '留言成功2秒後返回';
header('refresh:2;url=./view.php');