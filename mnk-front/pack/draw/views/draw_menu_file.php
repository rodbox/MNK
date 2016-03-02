<li class="parent">
	<a href="#" class="toggleView">Fichier<?php ui::img("arrow-down2","16");  ?></a>

<ul>
<li><?php  form::iform("pack-exec:project_draw/new_canvas #new","POST");
ui::img("file9","16");
form::text("w","",1000);
echo "x";
form::text("h","",1000);
form::submit("créer","créer"); 
form::formOut();
?> </li>
<li><?php mnk::ilink("pack-exec:project_draw/load #load",ui::rimg("folder-open3","16")); ?> 
<?php 
$data[] ="";
foreach ($d as $key => $value) {
		$basename = basename($value);
		$data[$basename] = $basename;
	}
	form::select("files_list",$data); 
?></li>
<li>
<?php 
form::iform("pack-exec:project_draw/draw_save #save","POST");
ui::img("disk","16"); 
form::text("filename"); 
form::select("extension",array("png"=>"png","jpeg"=>"jpeg"));
form::submit("save","save"); 
form::formOut();
?>

</li>
<li>
<?php 
/*form::iform("pack-exec:project_draw/draw_save_svg #save_svg","POST");
ui::img("vector","16");  
form::text("filename"); 
form::select("extension",array("svg"=>"svg"));
form::submit("export","export");*/ ?>
</li>
</ul>