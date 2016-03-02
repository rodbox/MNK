<?php 
	form::iform("pack-exec:snippet-manager/snippet-scan-string .snippet-editor","POST");
?>

<?php 
	form::text("prefix-Content","prefix-Content");
	// form::text("trigger","Trigger",$d['TRIGGER']);
	// form::textarea("content","Content",$d['CONTENT']);
	// form::textarea("desc","Description",$d['DESC']);
$opt = array(" "=>" ","source.php"=>"php","source.html"=>"html","source.js"=>"js","source.css"=>"css");
	form::select("type",$opt,"Contexte");
	?>
	<hr>
	<?php
	form::submit("Scan","Scan");
	form::formOut();
 ?>
 