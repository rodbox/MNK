<?php 
extract($_POST);

$json =  DIR_USER_ROOT."/user/contact.json";

$d = mnk::load_json($json);
// $d[]=$contact;

$key = array_search($contact,$d);
unset($d[$key]);

mnk::push_json($json,$d);
 ?>