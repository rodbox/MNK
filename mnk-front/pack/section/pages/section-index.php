<?php mnk::css("pack:section/section"); ?>
<?php mnk::js("pack:section/section"); ?>
<div class="row-fluid">
	<div class="span9">

	<?php 
metro::modalLinkMini("open","folder","open","turquoise");
	metro::modal("open","open","pack:section/section-select","section-file-list"); ?>	

	<?php 
metro::modalLinkMini("delete","remove","delete","turquoise");
	metro::modal("delete","delete","pack:section/section-delete","section-file-list"); ?>

<br><br>



		<?php form::iform("pack-exec:section/div-section-save #section-save");?>
		<?php metro::portletLight("","pack:section/workspace","section-load",array("title_project"=>$_GET["title_project"]));?>
	<div class=" center footer">

<input type="submit" value="save"/>
<?php mnk::ilink("pack-page:section/preview","",array("title_project"=>$_GET["title_project"])); ?>
		<input type="button" value="preview"/>
</a>
	</div>
	<?php form::formOut();?>
	</div>
	<div class="span3 divabs "><div class="fixed">
		<?php metro::portletLight("","pack:section/meta-section");?>
	</div></div>



</div>