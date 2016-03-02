<?php 
$metaView 	=  explode(",",$_GET['view']);
$view 		= $metaView[0];
$model		= $metaView[1];

mnk::iview($view,$model,$_GET);

 ?>