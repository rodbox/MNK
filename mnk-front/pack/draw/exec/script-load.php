<?php 
	extract($_POST);  
	echo file_get_contents(DIR_PACK."/draw/config/tools/".$tool);
?>