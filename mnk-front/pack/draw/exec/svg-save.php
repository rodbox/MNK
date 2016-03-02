<?php extract($_POST); ?>
<?php 

file_put_contents(DIR_DRAW."/my-svg.svg", $svg);

?>