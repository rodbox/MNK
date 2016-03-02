<?php extract($_GET); ?>

<?php mnk::debug($d["params"][0]["params"][0]["params"],"right");

$func = $name;
echo $d["params"][0]["params"][0];

	 ?>

<?php function paramList($param,$recur = true){
	echo "<ul class='rocket-manager'>";
	foreach ($param as $key => $value) {
		echo "<li>";
		// mnk::debug($value["param"]);
		echo $value["name"];
		echo ' <span class="c-12 small">'.count($value["param"]).'</span>';
		if($recur){
			echo "<ul>";
			foreach ($value["param"] as $keyP => $valueP) {
				echo "<li>".$valueP."</li>";
			}
			echo "</ul>";
		}
		echo "</li>";
	}
	echo "</ul>";

} ?>
<?php metro::portletLightIn(); ?>
<div class="menu">
	<a href="#addParam" id="addParam"><?php ui::img("plus",16,"000"); ?></a>
	<a href="#select" id="select"><?php ui::img("cursor2",16,"000"); ?></a>
	<a href="#del-mod" id="del-mod"><?php ui::img("remove4",16,"000"); ?></a>
	<?php mnk::ilink("pack-exec:rocket/params-lister-".$func. " #param-lister",ui::rimg("database3",16,"000")); ?>
	<?php mnk::ilink("pack-page:test/lister",ui::rimg("folder",16,"000")); ?>
</div>
<div class="ingrid">
	<pre><?php echo $d["funcList"][$key]["func"] ?></pre>
</div>

<?php //form::iform("pack-exec:rocket/rocket-param-save");?>
<table class="table table-condensed rocket-manager">
	<thead>
		<tr>
			<?php for ($i=1; $i <= $nbParam; $i++) { 
				echo "<th>";
				echo "param ".$i."<br/>";
				$opt =  array(
					"static"=>"static",
					"cond"=>"cond",
					);
				
				form::select("paramType".$i,$opt,"","static",array("class"=>"paramType"));
?>
<br>
<?php


				$opt =  array(
					//"url"=>"url",
					"this"=>"this"
					);
				
				form::select("paramSrc".$i,$opt,"","this",array("class"=>"paramSrc"));

?>
<br>
<?php

				$opt =  array(
					"val"=>"val"
					//"key+val"=>"key+val",
					);
				
				form::select("paramSearch".$i,$opt,"","val",array("class"=>"paramSearch"));


				echo "</th>";
			} ?>

		</tr>
	</thead>
	<tbody>

		<tr>
			<?php for ($i=0; $i < $nbParam; $i++) { 
				echo "<td>";
				
				echo "<ul>";
				foreach ($d["params"][$i]["params"] as $keyParam => $valueParam) {
					echo "<li>";?>


				<?php 

				$c = count($valueParam["params"]);
				$color = ($c>0)?"c-12":"c-22";
				?>
					<input type="text" value="<?php echo $valueParam["value"]; ?>" name="param<?php echo $i ?>[]">
				<?php echo "<span class='small ".$color."'>".$c."</span>"; ?>
				<?php echo "</li>";
			}

			?><li>
			<textarea name="param" class="paramListAuto"  cols="30" rows="5"></textarea>
		</li>
		<?php 


		echo "</ul>";
		echo "</td>";
	} ?>

</tr>

</tbody>
</table>

<div class="footer">
	<?php 
	form::submit("save","save");
	//form::formOut();
	?>
</div>
<?php metro::portletOut();?>