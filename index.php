<?php
if (!mysqli_connect("localhost", "root", "", "MsgDB", 3306)) {
    header("Location: CreatDB.php");
    exit();
}

$net = "localhost"; // 網址
$userName = "root"; // 使用者
$password = ""; // 密碼
$datebase = "MsgDB"; //連接資料庫
$link = mysqli_connect($net, $userName, $password, $datebase, 3306);
if (!$link) {
    die("連接失敗：" . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");

$sql = "select u_id, u_name, u_msg, u_time
from `Message` ;";
$msg = mysqli_query($link, $sql);

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
<?php while ($row = @mysqli_fetch_assoc($msg)) {?>
    <div class="media border p-3">
        <div class="media-body">
        <h5><?=$row["u_name"]?><small><i>(<?=$row["u_time"]?>)</i></small></h5>
        <p><?=$row["u_msg"]?></p>
        <a href="changeMsg.php?u_id=<?=$row["u_id"]?>">修改</a>
        <a href="DelMsg.php?u_id=<?=$row["u_id"]?>">刪除</a>
<?php
$link = mysqli_connect("localhost", "root", "", "MsgDB", 3306);
    if (!$link) {
        die("連接失敗：" . mysqli_connect_error());
    }
    mysqli_query($link, "set names utf8");

    $uid = $row['u_id'];

    $sql = "select r_id, u_id, r_name, r_msg, r_time
from `remessage`
where u_id=$uid;";
    $remsg = mysqli_query($link, $sql);

    mysqli_close($link);
    while ($rerow = @mysqli_fetch_assoc($remsg)) {
        ?>
        <div class="p-3">
        <div class="border p-2">
        <h5><?=$rerow["r_name"]?><small><i>(<?=$rerow["r_time"]?>)</i></small></h5>
        <p><?=$rerow["r_msg"]?></p>
        </div>
        </div>
    <?php }?>
        <div align="right">
            <a href="remessage.php?u_id=<?=$row["u_id"]?>">回覆</a>
        </div>
        </div>
    </div>
        <br>
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