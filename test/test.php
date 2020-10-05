<?php
$a = file_get_contents('./ly.txt');
$aa = json_decode($a,true);
date_default_timezone_set("Asia/Taipei");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言板</title>
</head>
<body>
	<center><h1>留言板</h1></center>
	<hr >

	<table border="1" cellspacing="0" align="center" width="600">
		<form action="ly.php" method="post">
			<tr>
				<th>姓名</th>
				<td>
					<input type="text" name="xm">
				</td>
			</tr>
			<tr>
				<th>標題</th>
				<td>
					<input type="text" name="bt">
				</td>
			</tr>
			<tr>
				<th>內容</th>
				<td>
					<textarea name='nr' rows=5 cols=70 placeholder="請填寫留言內容！"></textarea>
				</td>
			</tr>
			<tr>
				<th colspan="2">
					<input type="hidden" name="sj" value="<?= date("Y/m/d h:i:sa")?>">
					<input type="submit" name="提交">
					<input type="reset" name="">
				</th>
			</tr>
		</form>
	</table>
	<hr >
	<table border="1" cellspacing="0" width="1000" align="center">
		<caption>留言內容</caption>
		<tr>
			<th width="100">姓名</th>
			<th width="120">標題</th>
			<th>內容</th>
			<th width="100">時間</th>
			<th width="100">操作</th>
		</tr>
			<?php foreach($aa as $k => $v): ?>
				<tr>
					<td align="center"><?= $v['xm'] ?></td>
					<td align="center"><?= $v['bt'] ?></td>
					<td><?= $v['nr'] ?></td>
					<td><?= $v['sj'] ?></td>
					<td align="center">
						<a href='./sc.php?id=<?= $k ?>'>刪除</a>  
						<a href='./xg.php?id=<?= $k ?>'>修改</a>
					</td>

				</tr>

			<?php endforeach ?>
		
	</table>
</body>
</html>