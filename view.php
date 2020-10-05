<?php
$lod = file_get_contents('./use.txt');
$lod_use = json_decode($lod,true);
date_default_timezone_set("Asia/Taipei");
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
<?php foreach($lod_use as $k => $v){?>
    <div class="media border p-3">
        <div class="media-body">
        <h6><?= $v["u_name"]?> <small><i>(<?= $v["u_time"]?>)</i></small></h6>
        <p><?= $v["u_mesg"]?></p>
        <a href="">修改</a>
        <a href="">刪除</a>
        <div align="right">
            <a href="remassge">回覆</a>
        </div>
        <div class="p-3">
        <div class="border">
            <h6>Jane Doe <small><i>Posted on February 20 2016</i></small></h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>  
        </div> 
        </div>
        <div align="right">
            <a href="remessage">回覆</a>
        </div>
    </div>
<?php }?>
</body>
</html>