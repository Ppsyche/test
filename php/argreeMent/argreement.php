<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>协议</title>
	<style>
		.box{
			width: 960px;
			margin: 0 auto;
		}
		.btn{
			/*width: 100%;*/
			padding: 20px;
			text-align: center;
		}
		.left {
			-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
			-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
			box-shadow:inset 0px 1px 0px 0px #bbdaf7;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5));
			background:-moz-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background:-webkit-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background:-o-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background:-ms-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background:linear-gradient(to bottom, #79bbff 5%, #378de5 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5',GradientType=0);
			background-color:#79bbff;
			-moz-border-radius:6px;
			-webkit-border-radius:6px;
			border-radius:6px;
			border:1px solid #84bbf3;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:Arial;
			font-size:15px;
			font-weight:bold;
			padding:6px 24px;
			text-decoration:none;
			text-shadow:0px 1px 0px #528ecc;
			margin-right: 30px;
		}
		.left:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff));
			background:-moz-linear-gradient(top, #378de5 5%, #79bbff 100%);
			background:-webkit-linear-gradient(top, #378de5 5%, #79bbff 100%);
			background:-o-linear-gradient(top, #378de5 5%, #79bbff 100%);
			background:-ms-linear-gradient(top, #378de5 5%, #79bbff 100%);
			background:linear-gradient(to bottom, #378de5 5%, #79bbff 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff',GradientType=0);
			background-color:#378de5;
		}
		.left:active {
			position:relative;
			top:1px;
		}
		.right {
			-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
			box-shadow:inset 0px 1px 0px 0px #ffffff;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
			background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
			background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
			background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
			background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
			background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
			background-color:#ededed;
			-moz-border-radius:6px;
			-webkit-border-radius:6px;
			border-radius:6px;
			border:1px solid #dcdcdc;
			display:inline-block;
			cursor:pointer;
			color:#777777;
			font-family:Arial;
			font-size:15px;
			font-weight:bold;
			padding:6px 24px;
			text-decoration:none;
			text-shadow:0px 1px 0px #ffffff;
		}
		.right:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed));
			background:-moz-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
			background:-webkit-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
			background:-o-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
			background:-ms-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
			background:linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed',GradientType=0);
			background-color:#dfdfdf;
		}
		.right:active {
			position:relative;
			top:1px;
		}
		form{
			display: inline-block;
		}
	</style>
</head>
<body>
	<div class="box">
		<div class="agreement">
			<?php
				$txt = nl2br(file_get_contents("agreement.txt"));
				echo $txt;
			?>
		</div>
		<div class="btn">
			<form action="next.php" method="get">
				<input class="left" type="submit" value="同意">
			</form>
			<form action="index.php" method="get">
				<input class="right" type="submit" value="不同意">
			</form>
		</div>
	</div>
</body>
</html>

