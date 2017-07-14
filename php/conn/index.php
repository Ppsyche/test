<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.type a{
			margin-right: 5px;
		}
	</style>
</head>
<body>
	<a href="add.php">添加文章</a>
	<span>
		<?php
			if($_COOKIE['uid']){
				echo $_COOKIE['uname']." 已登录 ";
				echo "<a href='ulogin.php'>注销登录</a>";
			}else{
				echo "<a href='login.php'>未登录</a>";
			}
		?>	
	</span>

	<form action="index.php?ye=0" method="get">
		<input type="text" name="search">&nbsp;&nbsp;
		<input type="submit" name="sub" value="搜索">
	</form>
	<div class="type">
		<?php 
			for ($i=1; $i<=10; $i++) { 
				echo "<a href='index.php?ye=0&&type=$i'>类别$i</a>";
			}
		?>
	</div>
	<?php 
		if(isset($_GET['ye'])){
			$ye=$_GET['ye'];
		}else{
			$ye=0;
		}
		include 'conn.php';
		if(isset($_GET['search'])){
			$se=$_GET['search'];
			$w="title like '%$se%'";
		}else{
			$w=1;
		}

		$sql="select * from blog where $w order by bid desc limit ".($ye*5).",5";
		// echo $sql;
		// $sql="select * from blog by bid desc limit 5";
		$query=mysqli_query($link,$sql);
		while($arr=mysqli_fetch_array($query)){
			$bol=true;
			if(isset($_GET['type'])){
				$bol=false;
				$type=$_GET['type'];
				$types=explode("-",$arr['type']);
				for($i=0 ;$i<count($types) ;$i++){
					if($type==$types[$i]){
						$bol=true;
						break;
					}
				}
			}
			if($bol){
	?>
				<h3>
					<a href="all.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title'] ?></a> | 
					<a href="del.php?bid=<?php echo $arr['bid'] ?>">删除</a> | 
					<a href="edit.php?bid=<?php echo $arr['bid'] ?>">修改</a>
				</h3>
				<li><?php echo $arr['time'] ?></li>
				<p><?php echo iconv_substr($arr['content'],0,4);?>...</p>
				<p>作者：<?php echo $arr['writer']?></p>
				<hr>
	<?php
			}		
		}
		$sql="select count(*) from blog where $w";
		$query=mysqli_query($link,$sql);
		$arr=mysqli_fetch_array($query);//$arr[0]=7
		if($ye!=0){
	?>
			<a href="index.php?ye=0">首页</a>
			<a href="index.php?ye=<?php echo $ye-1 ?>">上一页</a>
	<?php
			}
		if($ye<=ceil($arr[0]/3)){
			$a=$_SERVER['PHPSELF'];
	?>
			
			<a href="<?php echo $a ?>?ye=<?php echo $ye+1 ?>">下一页</a>
			<a href="index.php?ye=<?php echo ceil($arr[0]/3) ?>">尾页</a>
	<?php
		}
		
	?>
	
</body>
</html>