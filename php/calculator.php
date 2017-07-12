<?php 
	if(isset($_GET['sub'])){
		$num1=$_GET['num1'];
		$num2=$_GET['num2'];
		$ysf=$_GET['ysf'];
		$sum=0;
		switch ($ysf) {
			case '+':
				$sum=$num1+$num2;
				break;
			case '-':
				$sum=$num1-$num2;
				break;
			case '*':
				$sum=$num1*$num2;
				break;
			case '/':
				$sum=$num1/$num2;
				break;
			case '%':
				$sum=$num1%$num2;
				break;
			default:
				echo "输入有误";
				break;
		}
	}
?>

<!-- <html lang="en">
<head> -->
	<meta charset="UTF-8">
	<!--<title>计算器</title>-->
<!-- </head>
<body> -->
	<table align="center" border="1" width="500">
		<caption><h1>计算器</h1></caption>
		<form action="calculator.php" method="get">
			<tr>
				<td>
					<input type="text" name="num1" value="<?php echo $_GET['num1']?$_GET['num1']:''?>">
				</td>
				<td>
					<select name="ysf">
						<option value="+" <?php echo ($_GET['ysf']=='+')?'selected':''?>>+</option>
						<option value="-" <?php echo ($_GET['ysf']=='-')?'selected':''?>>-</option>
						<option value="*" <?php echo ($_GET['ysf']=='*')?'selected':''?>>*</option>
						<option value="/" <?php echo ($_GET['ysf']=='/')?'selected':''?>>/</option>
						<option value="%" <?php echo ($_GET['ysf']=='%')?'selected':''?>>%</option>
					</select>
				</td>
				<td>
					<input type="text" name="num2" value="<?php echo $_GET['num2']?$_GET['num2']:''?>">
				</td>
				<td>
					<input type="submit" name="sub" value="计算"/>
				</td>
			</tr>
			<?php
				if(isset($_GET['sub'])){
					echo "<tr>";
					echo "<td colspan='4'>".$num1."$ysf".$num2."=".$sum."</td>";
					echo "</tr>";
				}
			?>
		</form>
	</table>
<!-- </body>
</html> -->