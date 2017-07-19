<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>日历</title>
	<style>
		table{
			border: 1px solid #050;
		}
		.fontb{
			color: #fff;
			background: #5af;
		}
		th{
			width: 30px;
		}
		th,td{
			height: 30px;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php 
		include "date.php";

		$rili=new myDate();
		$rili->out();
	?>
</body>
</html>