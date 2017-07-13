<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="add.php">添加文章</a>
	<?php 
		if(isset($_GET['ye'])){
			$ye=$_GET['ye'];
			include 'conn.php';
			// $tiao=$ye*2;
			$sql="select * from blog order by bid desc limit ".($ye*2).",2";
			// echo $sql;
			// $sql="select * from blog by bid desc limit 2";
			$query=mysqli_query($link,$sql);
			while($arr=mysqli_fetch_array($query)){
	?>
		<h3>
			<a href="all.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title'] ?></a> | 
			<a href="del.php?bid=<?php echo $arr['bid'] ?>">删除</a> | 
			<a href="edit.php?bid=<?php echo $arr['bid'] ?>">修改</a>
		</h3>
		<li><?php echo $arr['time'] ?></li>
		<p><?php echo iconv_substr($arr['content'],0,4);?>...</p>
		<hr>
	<?php		
			}
			$sql="select count(*) from blog";
			$query=mysqli_query($link,$sql);
			$arr=mysqli_fetch_array($query);//$arr[0]=7
			if($ye!=0){
	?>
				<a href="index.php?ye=0">首页</a>
				<a href="index.php?ye=<?php echo $ye-1 ?>">上一页</a>
	<?php
			}
			if($ye<=ceil($arr[0]/3)){
	?>
				<a href="index.php?ye=<?php echo $ye+1 ?>">下一页</a>
				<a href="index.php?ye=<?php echo ceil($arr[0]/3) ?>">尾页</a>
	<?php
			}
		}
	?>
</body>
</html>