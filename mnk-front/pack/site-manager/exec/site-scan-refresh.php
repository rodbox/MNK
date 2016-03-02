<?php 


	mnk::mod_load("file"); 
	mnk::pack_config("site-manager"); 
extract($_GET);
	$d["file"] = file::file_list(DIR_SITE."/".$site);
	$d["update"] = date("Y-m-d H:i:s");

$json = json_encode($d);

file_put_contents(SITE_META_FILES."/".$site."/".$site."-file.json",$json);

 ?>