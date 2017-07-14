<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		include 'conn/conn.php';
		find(0);

		function find($p){
			global $link;
			$sql="select * from table2 where pid=$p";
			$query=mysqli_query($link,$sql);
			echo "<ul>";
			while($arr=mysqli_fetch_array($query)){
				echo "<li>".$arr['name']."</li>";
				find($arr['id']);
			}
			echo "</ul>";
		}	
	?>
</body>
</html>