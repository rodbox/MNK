<?php 
extract($_POST);
foreach ($_POST['file'] as $key => $value){
	$file = DIR_PACK.'/'.$value;
	$dest = DIR_TMP.'/basket/pack/'.$value;

	mkdirLoop(dirname($value));
		rename($file, $dest);

	//
	//unlink($file);
}

function mkdirLoop($dir){
	$dirList = explode("/", $dir);
	$mkDirEval = DIR_TMP.'/basket/pack';
	foreach ($dirList as $key => $value) {
		$mkDirEval = $mkDirEval.'/'.$value;
		if(!file_exists($mkDirEval))
			mkdir($mkDirEval);
		# code...
	}
}
	
?>