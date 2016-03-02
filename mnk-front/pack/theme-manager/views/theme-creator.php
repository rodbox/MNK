<?php 

	form::iform("pack-exec:theme-manager/theme-creator #theme-creator","POST");

	form::text("themeName","","",array("style"=>"width:200px;"));

	form::submit("Créer","Créer",array('class' => "btn green plus"));

	form::formOut();

 ?>