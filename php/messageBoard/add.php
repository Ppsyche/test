<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="add.php" method="post">
		标题：<input type="text" name="title"> <br>
		内容：<textarea name="con" cols="20" rows="10"></textarea><br>
		<input type="submit" name="sub" value="添加文章">
	</form>
	<?php 
		include "conn.php";
		if(isset($_POST['sub'])){
			$title = $_POST['title'];
			$con=$_POST['con'];
			$sql="insert into blog(bid,title,content,time) values(null,'$title','$con',now())";
			echo $sql;
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