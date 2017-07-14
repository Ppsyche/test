<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		$newpass=$_POST['newpass'];
		$sql="select * from user where uname='$uname' and pass='$pass'";
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);

		if ($result) {
			$sql="update user set pass='$newpass' where uname='$uname'";
			$query=mysqli_query($link,$sql);
			if(mysqli_fetch_array($query)){
				header("location:login.php");
			}
			else{
				echo "<script>alert('修改失败')</script>";
				echo "<script>location='change.php'</script>";	
			}
		}
		else{
			echo "<script>alert('用户名和密码不匹配')</script>";
			echo "<script>location='change.php'</script>";
		}
		
	}

?>

<meta charset="utf-8">
<form action="change.php" method="post">
	用户名:<input type="text" name="uname"><br />
	密码:<input type="password" name="pass"><br />
	新密码:<input type="password" name="newpass"><br />
	<input type="submit" name="sub" value="修改">	

</form>