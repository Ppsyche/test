<?php 
	@$link=mysqli_connect("localhost","root","") or die("数据库连接错误");
	@mysqli_select_db($link,'liuyan') or die("选择数据库错误");
	@mysqli_set_charset($link,"UTF8");
 ?>
