<?php
require_once('mnk-include/core/mnk-core.php');
new mnk();

session_start();

$install = true;
$umanag = true;


if ($umanag){
	if ($install){
		theme::getIndex(); 
	}
 else {
        //include(WEB_STATIC . "/pack_list.php");
        echo'<a href="INSTALL">INSTALL me</a>';
	}
}?>