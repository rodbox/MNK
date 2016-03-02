<?php form::iform("pack-exec:draw/draw-svg-load #draw-svg-load","POST");?>

<?php foreach ($d as $key => $value): ?>
	<?php $opt[$value] = $value; ?>
	
<?php endforeach ?>

<?php form::select("svgFile",$opt); ?>

<?php form::submit("charger","charger");?>
<?php 
form::formOut();
 ?>