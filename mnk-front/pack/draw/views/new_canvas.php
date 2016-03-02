<?php 
	extract($d);
	echo '<script type="text/paperscript" src="'.WEB_PACK.'/draw/js/paper_script.js" canvas="myCanvas_1"></script>';
	echo '<canvas id="myCanvas_1" class="canvasActive" width="'.$w.'" height="'.$h.'"></canvas>';
?>