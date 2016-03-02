<?php extract($_GET); ?>
<h2>
	<?php  mnk::iview("pack:theme-manager/theme-list-select","theme-list",$theme); ?>
</h2>
<div class="row-fluid"><div class="span12">
	<div class="page-menu">


<?php 
	metro::modalLinkMini("theme-file-creator","file-plus2","title","turquoise");
	metro::modal("theme-file-creator","Thème : Ajouter un fichier","pack:theme-manager/theme-file-creator","theme-list"); 
?>

<?php 
	metro::modalLinkMini("theme-creator","stack-plus","title","turquoise");
	metro::modal("theme-creator","Thème : nouveau","pack:theme-manager/theme-creator"); 
?>


	<?php 

	//metro::modalLinkView ("t",ui::rimg("file-plus2",28,"fff",array("class"=>"alpha_4")),"pack:theme-manager/theme-file-creator","theme-list","","",array("class"=>"big-round bg-silver")); ?> 
<?php //metro::modalLinkView ("theme-creator",ui::rimg("stack-plus",28,"fff",array("class"=>"alpha_4")),"pack:theme-manager/theme-creator","","","",array("class"=>"big-round bg-silver")); ?>

<?php mnk::ilink("pack-exec:theme-manager/theme-file-delete",ui::rimg("file-remove2",16,"fff",array("class"=>"alpha_4")),array("type","file","theme"),array("class"=>"theme-bt theme-bt-file-delete modal-mini bg-silver")) ?>
</div>
	</div>
	</div>
<div class="row-fluid">
	
	<div class="span4">
		
		<?php metro::portlet("Views","eye","red","pack:theme-manager/theme-file-list","theme-file-list",array("theme"=>$theme,"folder"=>"views")); ?>
		
		
	</div>
	
	<div class="span4">
		
		<?php metro::portlet("JS","code","dark","pack:theme-manager/theme-file-list","theme-file-list",array("theme"=>$theme,"folder"=>"js")); ?>
		<?php metro::portlet("CSS","file-css","purple","pack:theme-manager/theme-file-list","theme-file-list",array("theme"=>$theme,"folder"=>"css")); ?>
		<?php metro::portlet("Img","images2","blue","pack:theme-manager/theme-file-list","theme-file-list",array("theme"=>$theme,"folder"=>"img")); ?>
	</div>
<div class="span4"><?php metro::portlet("Page","stack-list","yellow","pack:theme-manager/theme-file-list","theme-file-list",array("theme"=>$theme,"folder"=>"page")); ?></div>
	
</div>