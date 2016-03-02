<?php 

//$user  = (isset($_POST["share"]))?0:$_SESSION["user"]["id"];



$dirJson = DIR_USER."/0/dico/link.json";
$json = mnk::load_json($dirJson);
$json[]=$_POST["link"];

mnk::push_json($dirJson,$json);

?>