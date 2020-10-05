<?php
if(empty($_POST['bt']) || empty($_POST['xm']) || empty($_POST['nr'])){
	die('對不起，您沒有輸入不能提交');
} 
$ly = file_get_contents ('./ly.txt');
$lyy = json_decode($ly,true);
$lyy[] = $_POST;
$lyyy = json_encode($lyy);
file_put_contents('./ly.txt',$lyyy);
echo '留言成功2秒後返回';
header('refresh:2;url=./index.php');
?>