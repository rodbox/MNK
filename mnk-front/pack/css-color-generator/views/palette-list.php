<?php 
form::iform("pack-exec:css-color-generator/load-palette .load-palette");
// form::iform("pack:css-color-generator/create-palette #create-palette");

foreach ($d as $key => $value) {
	  $title = str_replace(array("palette-",".json"),"",$value);
	$opt[$title] = $title;
}


form::select("palette",$opt);
form::hidden("","palette-result");
form::submit("palette","load-palette");
?>
<?php form::formOut(); ?>