<?php 

	mnk::mod_load("file"); 
	mnk::pack_config("site-manager"); 
extract($_GET);

	$scan = mnk::load_json(SITE_META_FILES."/".$site."/".$site."-file.json");
	$d['scan'] = $scan['file'];
	// $d['scan'] = file::file_list(DIR_SITE."/".$site);

	$d['filter'] = stripslashes(file_get_contents(SITE_META_FILES."/".$site."/".$site."-filter.json"));

?>