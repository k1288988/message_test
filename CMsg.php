<?php
if (empty($_POST['u_name']) || empty($_POST['u_msg'])) {
    die('都要填寫');
}
$uid = $_GET["u_id"];

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

$sql = "select u_id, u_name, u_pass, u_msg, u_time
from `Message`
where u_id=$uid ;";
$msg = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($msg);

if ($_POST["u_pass"] != $row["u_pass"]) {
    die('密碼錯誤');
}

$uname = $_POST['u_name'];
$umsg = $_POST['u_msg'];
$uid = $row["u_id"];
$utime = date("Y-m-d H:i:s", time());

$sql = "update Message set
    u_name = '$uname',
    u_msg = '$umsg',
    u_time = '$utime'
    where u_id = $uid;";
mysqli_query($link, $sql);

mysqli_close($link);

echo '修改成功2秒後返回';
header('refresh:2;url=./index.php');
