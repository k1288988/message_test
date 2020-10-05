<?php
date_default_timezone_set("Asia/Taipei");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增留言</title>
</head>
<body>
<form action="add.php" method="post">
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
      <textarea id="message" name="u_mesg" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <input type="hidden" name="u_id" value="<?= time()?>">
      <input type="hidden" name="u_time" value="<?= date("Y-m-d H:i:s",time())?>">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <a href="view.php">觀看留言</a>
    </div>
  </div>
</form>
</body>
</html>