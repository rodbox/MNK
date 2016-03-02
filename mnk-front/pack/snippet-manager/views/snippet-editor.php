<?php 

	mnk::iview("pack:snippet-manager/snippet-pop");

	form::iform("pack-exec:snippet-manager/snippet-create .snippet-editor","POST");
?>
<?php form::button("new","Nouveau"); ?>
<br>
<br>
<?php 

	

	form::text("snippetName","Nom du fichier");
	form::text("trigger","Trigger",$d['TRIGGER']);
	form::textarea("content","Content",$d['CONTENT'],array("id"=>"snippet-content"));




	form::textarea("desc","Description",$d['DESC']);
$opt = array(" "=>" ","source.php"=>"php","source.html"=>"html","source.js"=>"js","source.css"=>"css");
	form::select("type",$opt,"Contexte");
	?>
	<hr>
	<?php
	
	form::submit("Enregistrer","Enregistrer");
	form::formOut();
 ?>