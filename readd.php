<?php
if (empty($_POST['r_name']) || empty($_POST['r_msg'])) {
    die('都要填寫');
}
date_default_timezone_set("Asia/Taipei");

$net = "localhost"; // 網址
$userName = "root"; // 使用者
$password = ""; // 密碼
$datebase = "MsgDB"; //連接資料庫
$link = mysqli_connect($net, $userName, $password, $datebase, 3306);
if (!$link) {
    die("連接失敗：" . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");

$rname = $_POST['r_name'];
$rmsg = $_POST['r_msg'];
$uid = $_POST['u_id'];
$rtime = date("Y-m-d H:i:s", time());
$sql = "INSERT INTO `remessage` (`r_name`, `u_id`, `r_msg`, `r_time`)
VALUES('$rname', '$uid' , '$rmsg', '$rtime');";
mysqli_query($link, $sql);

mysqli_close($link);

echo '留言成功2秒後返回';
header('refresh:2;url=./view.php');
