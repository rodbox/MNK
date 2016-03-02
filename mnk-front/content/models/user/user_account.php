<?php

extract($_POST);

$p = array(
    'from' => "mnk_user",
    'where' => "user_User = '" . $_SESSION['user']['name'] . "'");

$r  = new db;
$r  =$r->reqSlt($p);

$d = $r->fetchAll();

?>