<?php foreach ($d as $key => $value): ?>
	<?php $fileMenu = file::filename($value); ?>
	<?php $opt[$fileMenu]=$fileMenu;	 ?>
<?php endforeach ?>
<?php 
form::select("fileMenu",$opt); ?>