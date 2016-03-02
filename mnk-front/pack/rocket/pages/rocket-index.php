<?php mnk::js("pack:rocket/rocket-editor"); ?>
<div class="row-fluid">
	<div class="span12 ">
	<h3><?php echo $_GET['name']; ?></h3>
<?php mnk::iview("pack:rocket/edit","rocket-param",array("name"=>$_GET['name'])); ?>


	</div>
</div>
