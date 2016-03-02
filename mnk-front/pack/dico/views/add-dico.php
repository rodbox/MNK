<?php form::iform("pack-exec:dico/add-dico #add-dico");?>
<?php

form::toggle("share","","share",true,"Public","Privée","5","2");
?>
<br>
<?php
$opt = array(
	'link' => 'link', 
	'js' => 'js', 
	'css' => 'css', 
	'php' => 'php',
	'info' => 'info'
	);


form::select("dico",$opt,"","link");
?>
<br>
<?php form::text("dicoTitleAdd","","");  ?>

<br>
<?php

form::textarea("dicoAdd","","");

 ?>

<div class="footer"><?php form::submit("Ajouter","Ajouter"); ?></div>


<?php 


form::formOut();?>
