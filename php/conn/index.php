<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#div1{
			width:50%;
			height:500px;
			float:left;
		}
		#div2{
			width:20%;
			height:200px;
			float:right;
			margin-right:100px;
			background:pink;
		}
	</style>
</head>
<body>
<div id="div1">
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
	<?php 
		if(isset($_GET['ye'])){
			$ye=$_GET['ye'];
		}else{
			$ye=0;
		}
		include 'conn.php';
		if(isset($_GET['search'])){
			$se=$_GET['search'];
			$w="blog,user where blog.writer=user.uid and blog.title like '%$se%'";
		}else if(isset($_GET['cid'])){
			
			$cid=$_GET['cid'];
			$w="blog,user,catalog where blog.writer=user.uid and catalog.catalog_id=blog.catalog_id and blog.catalog_id='$cid'";
		}else{
			$w="blog,user where blog.writer=user.uid";
		}
		
		// $sql="select * from  $w order by blog.bid desc ";

		$sql="select * from  $w order by blog.bid desc limit ".($ye*5).",5";
		$query=mysqli_query($link,$sql);
		
		
		
		while($arr=mysqli_fetch_array($query)){
			
	?>
			<h3>
				<a href="all.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title'] ?></a> | 
				<a href="del.php?bid=<?php echo $arr['bid'] ?>">删除</a> | 
				<a href="edit.php?bid=<?php echo $arr['bid'] ?>">修改</a> |
				<a href="reply.php?bid=<?php echo $arr['bid'] ?>">回复</a>
			</h3>
			<li><?php echo $arr['time'] ?></li>
			<p><?php echo iconv_substr($arr['content'],0,4);?>...(类型:<?php echo $arr['catalog_name'] ?>)</p>
			<p>作者：<?php echo $arr['uname']?></p>
			<hr>
	<?php
					
		}
		$sql="select count(*) from $w";
		$query=mysqli_query($link,$sql);
		$arr=mysqli_fetch_array($query);//$arr[0]=7
		if($ye!=0){
	?>
			<a href="index.php?ye=0">首页</a>
			<a href="index.php?ye=<?php echo $ye-1 ?>">上一页</a>
	<?php
			}
		if($ye<ceil($arr[0]/5)-1){
			$a=$_SERVER['PHPSELF'];
	?>
			
			<a href="<?php echo $a ?>?ye=<?php echo $ye+1 ?>">下一页</a>
			<a href="index.php?ye=<?php echo ceil($arr[0]/5)-1 ?>">尾页</a>
	<?php
		}
		
	?>
</div>
<div id="div2">
	<?php 
		$sql="select * from catalog";
		$query=mysqli_query($link,$sql);
		while($arr=mysqli_fetch_array($query)){
	?>
	<li><a href='index.php?cid=<?php echo $arr['catalog_id']?>'><?php echo $arr['catalog_name']?></a></li>
	<?php
		}
	?>
</div>
</body>
</html>