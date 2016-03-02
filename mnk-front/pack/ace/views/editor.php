<div class="span-9-10"><textarea id="my-code-area" rows="35" style="width: 100%; height:550px"><?php echo $_POST["code"]; ?></textarea></div>
<div class="span-1-10">
	<h1 style="margin-top:-40px; font-size:1em;">param</h1>

<ol class="param-list">
	<?php 
	$nodeList = explode("[", $_POST["node"]);
	// print_r($nodeList);
	foreach ($nodeList as $key => $value) {
		if($value!="")
		echo "<li>".str_replace("]","",$value)."</li>";
	}
	  ?>
	
</ol></div>
