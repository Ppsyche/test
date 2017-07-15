<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		if($_COOKIE['uid']){
			$writer=$_COOKIE['uid'];
		}else{
			echo "<script>location='login.php'</script>";
		}
	?>	
	<form action="add.php" method="post">
		<input type="hidden" name="writer" value="<?php echo $writer;?>">
		标题：<input type="text" name="title"> <br>
		内容：<textarea name="con" cols="20" rows="10"></textarea><br>
		类别：<select name="type" id="">
			<option value="1">电影</option>
			<option value="2">音乐</option>
			<option value="3">图书</option>
			<option value="4">类别4</option>
			<option value="5">类别5</option>
			<option value="6">类别6</option>
			<option value="7">类别7</option>
			<option value="8">类别8</option>
			<option value="9">类别9</option>
			<option value="10">类别10</option>
		</select><br>
		<input type="submit" name="sub" value="添加文章">
	</form>
	<?php 
		include "conn.php";
		if(isset($_POST['sub'])){
			$title = $_POST['title'];
			$con=$_POST['con'];
			$type=$_POST['type'];
			$sql="insert into blog(bid,title,content,time,writer,catalog_id) values(null,'$title','$con',now(),'$writer','$type')";
			// echo $sql;
			$query=mysqli_query($link,$sql);
			if($query){
				echo "<script>location='index.php?ye=0'</script>";
			}else{
				echo "<script>alert('插入失败')</script>";
				echo "<script>location='add.php'</script>";
			}
		}
	?>
</body>
</html>