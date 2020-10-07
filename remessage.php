<?php
if(!@mysqli_connect("localhost", "root", "",  "weatherDB", 3306)){ // 前三個分別是：IP地址, 使用者, 密碼
    header("CreatDatabase.php");
}
$themsg = $_GET['u_id'];
$net = "localhost"; // 網址
$userName = "root"; // 使用者
$password = ""; // 密碼
$datebase = ""; //連接資料庫
$link = mysqli_connect($net, $userName, $password,  $datebase, 3306); 
if(!$link){
    die("連接失敗：" . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");

$sql = "select u_id, u_name, u_msg, u_time
from `Message`
where u_id='$themsg';";
$msg = mysqli_query($link , $sql);

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>回覆</title>
</head>
<body>
<div class="container mt-3">
<?php while($row = mysqli_fetch_assoc($msg)){?>
    <div class="media border p-3">
        <div class="media-body">
        <h6><?= $row["u_name"]?><small><i>(<?= $row["u_time"]?>)</i></small></h6>
        <p><?= $row["u_msg"]?></p>
        </div>
    </div>
<?php }?>
    <hr>
    <form action="readd.php" method="post">
        <div class="form-group row">
        <label for="name" class="col-4 col-form-label">名字</label>
            <div class="col-8">
            <input id="name" name="r_name" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
        <label for="message" class="col-4 col-form-label">留言</label>
            <div class="col-8">
            <textarea id="message" name="r_msg" cols="40" rows="5" class="form-control"></textarea>
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">回覆</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>