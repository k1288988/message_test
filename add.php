<?php
if(empty($_POST['u_name']) || empty($_POST['u_pass']) || empty($_POST['u_mesg'])){
	die('都要填寫');
} 
$use = file_get_contents ('./use.txt');
$umesg = json_decode($ly,true);
$umesg[] = $_POST;
$lyyy = json_encode($umesg);
file_put_contents('./use.txt',$lyyy);
echo '留言成功2秒後返回';
header('refresh:2;url=./view.php');