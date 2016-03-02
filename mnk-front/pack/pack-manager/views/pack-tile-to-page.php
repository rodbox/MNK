
<?php foreach ($d as $key => $value):?>
	<?php 

	$title 		= str_replace(".php","",basename($value));
	$content 	= ui::rimg("link4","12","fff",array("class"=>"alpha_5")) . " " .$title;


	mnk::ilink("pack-page:".$_GET['pack']."/".$title,$content,array("pack"=>$_GET['pack']),array("class"=>"btn mini turquoise"));
	?>

<?php endforeach; ?>
<div class="clear"></div>