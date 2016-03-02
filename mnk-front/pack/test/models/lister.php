<?php 
// $d = file::listDir(DIR_PACK);


/*$d = mnk::load_json(DIR_USER_ROOT."/dico/link.json");
*/
$d = file::folder_list(dirname(DIR_ROOT));
	asort($d);


 ?>