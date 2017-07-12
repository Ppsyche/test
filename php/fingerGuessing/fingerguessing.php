<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>猜拳</title>
	<style>
		body{
			margin: 0;
			padding: 30px;
			background: #eee;
		}
		.left{
			float: left;
			/*height: 189px;*/
			height: 250px;	
		}
		span.left{
			line-height: 250px;
			margin: 0 20px; 
		}
		div.left{
			width: 222px;
			overflow: hidden;
			position: relative;
			border: 1px solid #ccc;
		}
		img{
			position: absolute;
		}
		form{
			width: 500px;
			text-align: center;
		}
		h5{
			font-size: 20px;
			width: 500px;
			text-align: center;
		}
		p{
			width: 222px;
			text-align: center;
		}
	</style>
</head>
<body>
	<form action="fingerguessing.php" method="get">
		<span>你出</span>
		<select name="you">
			<option value="0">石头</option>
			<option value="1">剪子</option>
			<option value="2">布</option>
			<input type="submit" name="sub" value="提交"/>
		</select>
	</form>
	<?php
		if(isset($_GET['sub'])){
			$you = $_GET['you'];
			$compt = rand(0,2);
			if($you == $compt){
				echo "<h5>平局</h5>";
			}else if(($you+2)%3 == $compt){
				echo "<h5>电脑获胜</h5>";
			}else{
				echo "<h5>你获胜</h5>";
			}
		}else{
			$you = -1;
			$compt = -1;
		}
	?>
	<div class="left">
		<p>你</p>
		<img src="caiquan.png" alt="" id="you-img">
	</div>
	<span class="left">VS</span>
	<div class="left">
		<p>电脑</p>
		<img src="caiquan.png" alt="" id="compt-img">
	</div>
	<script>
		var oYouImg = document.getElementById('you-img');
		oYouImg.style.left = -350*<?php echo $you;?>+'px';
		var oComptImg = document.getElementById('compt-img');
		oComptImg.style.left = -350*<?php echo $compt;?>+'px';
	</script>
	
</body>
</html>