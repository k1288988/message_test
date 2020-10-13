<?php
$uid = $_GET["u_id"];

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

$uid = $row["u_id"];

$sql = "DELETE FROM `remessage` WHERE `remessage`.`u_id` = '$uid';";
mysqli_query($link, $sql);

$sql = "DELETE FROM `Message` WHERE `Message`.`u_id` = '$uid';";
mysqli_query($link, $sql);

mysqli_close($link);

echo '刪除成功2秒後返回';
header('refresh:2;url=./index.php');
