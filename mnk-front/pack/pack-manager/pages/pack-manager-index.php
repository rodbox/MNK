<?php extract($_GET); ?>
<h2>
	<?php mnk::iview("pack:pack-manager/pack-list-select","pack-list",$pack); ?>
</h2>
<div class="row-fluid"><div class="span12"><div class="page-menu">
	<?php 
		metro::modalLinkMini("pack-creator","plus","Créer un pack","turquoise");
		metro::modal("pack-creator","Créer un pack","pack:pack-manager/pack-creator"); 
	?>
<?php 
	metro::modalLinkMini("pack-file-creator","file-plus2","Créer un fichier de pack","turquoise");
	metro::modal("pack-file-creator","Créer un fichier de pack","pack:pack-manager/pack-file-creator","pack-list"); 
?><?php mnk::ilink("pack-page:pack-manager/pack-page-list",ui::rimg("pencil6",16,"fff",array("class"=>"alpha_4")),array("type","file","pack"),array("class"=>" modal-mini bg-turquoise")) ?>
<?php mnk::ilink("pack-exec:pack-manager/pack-file-delete",ui::rimg("file-remove2",16,"fff",array("class"=>"alpha_4")),array("pack"=>$pack),array("class"=>"pack-bt modal-mini pack-bt-file-delete bg-silver")) ?>
<?php 
	metro::modalLinkMini("pack-installer","upload","Installer un pack","turquoise");
	metro::modal("pack-installer","Installer un pack","pack:pack-manager/pack-installer"); 
?>
<?php 
	metro::modalLinkMini("pack-zip","file-zip","Zip pack","turquoise");
	metro::modal("pack-zip","Zip pack","pack:pack-manager/pack-zip","pack-list"); 
?>


</div>

	</div>
<div class="row-fluid">
	<div class="span12">
		<?php mnk::iview("pack:pack-manager/pack-info","",array("pack"=>$pack)); ?>
	</div>
</div>
	</div>
<div class="row-fluid">
	
	<div class="span4">
		<?php metro::portlet("Exec","play","grey","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"exec")); ?>
		<?php metro::portlet("Models","database","midnight","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"models")); ?>
		<?php metro::portlet("Views","eye","red","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"views")); ?>
		
		
		
	</div>

	<div class="span4">
		<?php metro::portlet("CSS","file-css","purple","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"css")); ?>

<?php metro::portlet("JS","code","dark","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"js")); ?>
		<?php metro::portlet("Img","images2","blue","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"img")); ?>

		
	</div>
	<div class="span4"><?php metro::portlet("Config","settings","carrot","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"config")); ?><?php metro::portlet("Les demos","lab","green","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"demo")); ?>
		<?php metro::portlet("Page","stack-list","yellow","pack:pack-manager/pack-file-list","pack-file-list",array("pack"=>$pack,"folder"=>"pages")); ?>
	</div>
</div>
