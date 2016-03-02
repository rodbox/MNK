<?php 
extract($_POST);

$json =  DIR_USER_ROOT."/user/contact.json";

$d = mnk::load_json($json);
// $d[]=$contact;
foreach ($contact as $key => $value) {
	
	$dKey = array_search($value,$d);
	unset($d[$dKey]);
}

// print_r($d);
mnk::push_json($json,$d);
 ?>