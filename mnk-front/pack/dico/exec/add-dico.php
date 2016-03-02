<?php 

$user  = (isset($_POST["share"]))?0:$_SESSION["user"]["id"];



$dirJson = DIR_USER."/".$user."/dico/".$_POST["dico"].".json";
$json = mnk::load_json($dirJson);
$json[]=$_POST["dicoAdd"];

mnk::push_json($dirJson,$json);

?>