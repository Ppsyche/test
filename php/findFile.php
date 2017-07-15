<?php 
	function aa($dir,&$dirnum,&$filenum){
		if (!is_dir($dir)) {
			return false;
		}
		$handle=opendir($dir);
		while ($file=readdir($handle)) {
			if($file=="."||$file==".."){
				continue;
			}
			$file=$dir.DIRECTORY_SEPARATOR.$file;
			if(is_file($file)){
				$filenum++;
			}else{
				$dirnum++;
			}
		}
		return true;
	}
	$dir="E:/php/wamp64";
	if(aa($dir,$dirnum,$filenum)){
		echo "文件共".$filenum."个<br>";
		echo "文件夹共".$dirnum."个<br>";
	}else{
		echo "请输入合法的路径";
	}
?>