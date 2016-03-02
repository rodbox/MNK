<?php 
foreach ($_POST['file'] as $key => $value){
	$file = DIR_TMP.'/basket/'.$value;
	unlink($file);
}
