<?php 
extract($_POST);

$json =  DIR_USER_ROOT."/dico/link.json";

$d = mnk::load_json($json);
// $d[]=$contact;
foreach ($link as $key => $value) {
	
	$dKey = array_search($value,$d);
	unset($d[$dKey]);
}

// print_r($d);
mnk::push_json($json,$d);
 ?>