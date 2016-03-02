<?php extract($_POST); ?>
<?php 
mnk::pack_config("draw");
$svg = DIR_DRAW."/svg/".$svgFile;

echo file_get_contents($svg);
 ?>