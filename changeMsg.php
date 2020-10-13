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

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改</title>
</head>
<body>
<div class="container mt-3">
<form action="CMsg.php?u_id=<?=$row["u_id"]?>" method="post">
    <div class="form-group row ">
    <label for="name" class="col-4 col-form-label">名字</label>
        <div class="col-8">
        <input id="name" name="u_name" type="text" class="form-control" value="<?=$row["u_name"]?>">
        </div>
    </div>
    <div class="form-group row">
    <label for="password" class="col-4 col-form-label">密碼</label>
        <div class="col-8">
        <input id="password" name="u_pass" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
    <label for="message" class="col-4 col-form-label">留言</label>
        <div class="col-8">
        <textarea id="message" name="u_msg" cols="40" rows="5" class="form-control"><?=$row["u_msg"]?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">修改</button>
        </div>
    </div>
    </form>
</div>
</body>
</html>
