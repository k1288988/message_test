<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除留言</title>
</head>
<body>
<div class="container mt-3">
    <h2>請問真的要刪除嗎？</h2>
    <form action="dele.php?u_id=<?=$_GET["u_id"]?>" method="post">
    <div class="form-group row">
        <label for="password" class="col-4 col-form-label">確認密碼</label>
        <div class="col-8">
        <input id="password" name="u_pass" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">確定</buttons>
        </div>
    </div>
    </form>
</div>

</body>
</html>
