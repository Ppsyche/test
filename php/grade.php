<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>成绩查询</title>
	<style>
		body{
			margin: 0;
			padding: 30px;
			background: #eee;
		}
	</style>
</head>
<body>
	<p>同时分数在80到100之间是优秀 60到80之间是合格 其他分数是不合格</p>
	<h3>输入分数查询成绩</h3>
	<form action="grade.php" method="get">
		<input type="text" name="grade">
		<input type="submit" name="sub" value="提交查询">
		<input type="reset" value="重置分数">
	</form>
	<?php
		if(isset($_GET['sub'])){
			$grade = $_GET['grade'];
			settype($grade,"int");
			if($grade>=80){
	?>
				<script>alert('优秀');</script>
	<?php
			}
			else if($grade>=60){
	?>
				<script>alert('及格');</script>
	<?php
			}
			else{
	
	?>
				<script>alert('不及格');</script>
	<?php
			}
		}
	?>
</body>
</html>