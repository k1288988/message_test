<?php
$a=file_get_contents('./ly.txt');
$aa=json_decode($a,true);
$k= $_GET['id'];
date_default_timezone_set("Asia/Taipei");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言板——修改</title>
</head>
<body>
	<center><h1>留言板——修改</h1></center>
	<hr >

	<table border="1" cellspacing="0" align="center" width="600">
		<form action="xgcx.php" method="post">
			<tr>
				<th>姓名</th>
				<td>
					<input type="text" name="xm" value="<?= $aa[$k]['xm']; ?>">
				</td>
			</tr>
			<tr>
				<th>標題</th>
				<td>
					<input type="text" name="bt" value="<?= $aa[$k]['bt']; ?>">
				</td>
			</tr>
			<tr>
				<th>內容</th>
				<td>
					<textarea name='nr' rows=5 cols=70 placeholder="請填寫留言內容！"><?= $aa[$k]['nr']; ?></textarea>
				</td>
			</tr>
			<tr>
				<th colspan="2">
					<input type="hidden" name="id" value="<?= $k?>">
					<input type="hidden" name="sj" value="<?= date("Y/m/d h:i:sa")?>">
					<input type="submit" value="修改" >
					<input type="reset" name="">
				</th>
			</tr>
		</form>
	</table>
	</body>
</html>