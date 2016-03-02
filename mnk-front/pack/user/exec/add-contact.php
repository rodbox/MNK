<?php 
extract($_POST);

$json =  DIR_USER_ROOT."/user/contact.json";
echo $contact;
if($contact!=""){
	$d = mnk::load_json($json);
	if(!in_array($contact,$d)){
		$d[]=$contact;
		mnk::push_json($json,$d);
	}
}
 ?>