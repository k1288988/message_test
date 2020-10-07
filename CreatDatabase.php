<?php
$frist = mysqli_connect("localhost", "root", "" );
$sql = "CREATE DATABASE messageDB DEFAULT CHARACTER SET utf8;";
mysqli_query($frist , $sql);
mysqli_close($frist);

$net = "localhost"; // 網址
$userName = "root"; // 使用者
$password = ""; // 密碼
$datebase = ""; //連接資料庫
$link = mysqli_connect($net, $userName, $password,  $datebase, 3306); 
if(!$link){
    die("連接失敗：" . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");

$sql = "CREATE TABLE `Message`(
    u_id int AUTO_INCREMENT PRIMARY KEY,
    u_name varchar(20),
    u_pass varchar(10),
    u_msg varchar(200),
    u_time varchar(30)
    );
";
mysqli_query($link , $sql);

$sql = "CREATE TABLE `remessage`(
    r_id int AUTO_INCREMENT PRIMARY KEY,
    u_id int,
    r_name varchar(20),
    r_msg varchar(200),
    r_time varchar(30),
    FOREIGN KEY (u_id) REFERENCES `Message`(u_id)
    );
";
mysqli_query($link , $sql);

mysqli_close($link);

echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";