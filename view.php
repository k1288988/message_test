<?php
if(!@mysqli_connect("localhost", "root", "",  "weatherDB", 3306)){ // 前三個分別是：IP地址, 使用者, 密碼
    header("CreatDatabase.php");
}

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
from `Message` ;";
$msg = mysqli_query($link , $sql);

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
</head>
<body>
<div class="container mt-3">
    <div align="right">
        <a class="text-warning" href="#newMessage">新增留言</a>
    </div>
<?php while($row = mysqli_fetch_assoc($msg)){?>
    <div class="media border p-3">
        <div class="media-body">
        <h6><?= $row["u_name"]?><small><i>(<?= $row["u_time"]?>)</i></small></h6>
        <p><?= $row["u_msg"]?></p>
        <a href="">修改</a>
        <a href="">刪除</a>
        <div class="p-3">
        <div class="border p-2">
            <h6>Jane Doe <small><i>Posted on February 20 2016</i></small></h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>  
        </div>
        <div align="right">
            <a href="remessage.php?u_id=<?= $row["u_id"]?>">回覆</a>
        </div> 
        </div>
    </div>
<?php }?>
    <br><hr><br>
    <form id="newMessage" action="add.php" method="post">
    <div class="form-group row ">
    <label for="name" class="col-4 col-form-label">名字</label>
        <div class="col-8">
        <input id="name" name="u_name" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
    <label for="password" class="col-4 col-form-label">密碼</label>
        <div class="col-8">
        <input id="password" name="u_pass" placeholder="修改、刪除需要用到" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
    <label for="message" class="col-4 col-form-label">留言</label>
        <div class="col-8">
        <textarea id="message" name="u_msg" cols="40" rows="5" class="form-control"></textarea>
        </div>
    </div> 
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">發送</button>
        </div>
    </div>
    </form>
</div>
</body>
</html>