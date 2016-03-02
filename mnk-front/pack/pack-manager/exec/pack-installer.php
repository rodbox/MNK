<?php //mnk::debug($_POST); 
extract($_POST);

$dir2copy =  DIR_PACK."/".$pack;
$dir_paste =  dirname(DIR_ROOT)."/".$site."/mnk-front/pack/".$pack;


if (file::copy_dir($dir2copy, $dir_paste))
	msg::success("pack :".$pack ." installé. <br> sur le site : ".$site);

?>