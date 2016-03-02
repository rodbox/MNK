<?php
    require_once('core/mnk-core.php');
    new mnk;
    session_start();

    	if($_GET['type']=="classic"){
    		include (DIR_ROOT."/mnk-front/exec/".$_GET['exec'].".php");
    		}
    	else {
    		$data = explode("/", $_GET['exec']);
    		
    		include (DIR_PACK."/".$data[0]."/exec/".$data[1].".php");
    	}

?>