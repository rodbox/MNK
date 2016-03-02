<?php
    require_once('core/mnk-core.php');
    new mnk;
    session_start();
    
    $meta_cpl = explode("(",$_GET['cpl']);
    $meta_pagin = explode(",",$meta_cpl[1]);

   $cpl 		= $meta_cpl[0];
    
   	$cur_Page = $meta_pagin[0];
   	$num_Page =  substr($meta_pagin[1],0,-1);

   include (ABSPATH."/mnk-front/content/cpl/".$cpl.".php");
?>