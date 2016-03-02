<?php
extract($_GET);
$p = array(
    "select" => "user_ID, user_User, user_First, user_Last",
    "from"=>"mnk_user",
    "where"=> "user_User ='".$search."' OR ".
                        "user_First ='".$search."' OR ".
                        "user_Last ='".$search."'");

$r = db::reqSlt($p);



$d=($r==true)?$r->fetchAll():array();

?>