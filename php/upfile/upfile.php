<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>上传文件</title>
	<style>
		body{
			margin: 0;
			padding: 30px;
			background: #eee;
		}
	</style>
</head>
<body>
	<form action="upfile.php" method="post" enctype="multipart/form-data">
		上传文件：<input type="file" name="sfile">
		<input type="submit" name="sub" value="上传">		
	</form>
	<?php 
		if(isset($_POST['sub'])){
			$sfile = $_FILES['sfile'];
			$name = $sfile['name'];
			$arr = explode('.', $name);
			$len = count($arr)-1;
			$newarr = array('txt','md','exe');
			$flag = true;
			for ($i=0; $i <count($newarr); $i++) { 
				if($newarr[$i]==$arr[$len]){
					$flag = false;
				}
			}
			if($flag){
				// echo "ok";
				$imgname = time();
				$img = $imgname.'.'.$arr[$len];
				$baseurl = getcwd();
				$bb = move_uploaded_file($sfile['tmp_name'], $baseurl.'/upload/'.$img);
				if(bb){
					echo "success";
				}else{  
					echo "fail";
				}

			}else{
				echo "<script>alert('上传文件非法')</script>";
			}

			echo "<pre>";
				print_r($sfile);
			echo "</pre>";
		}
	 ?>
</body>
</html>