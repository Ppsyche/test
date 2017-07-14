<?php
	if($_COOKIE['uid']){
		setcookie('uid','');
		setcookie('uname','');
		echo "<script>location='index.php?ye=0'</script>";
	}
	

?>