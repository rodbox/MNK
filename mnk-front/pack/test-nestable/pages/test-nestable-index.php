<?php mnk::css("pack:test-nestable/test-nestable"); ?>
<div class="row-fluid">
	<div class="span12">
    <?php mnk::iview("pack:test-nestable/nestable-test"); ?>

	</div>
</div>
<?php mnk::js(array(
    "metro-plugins:jquery-nestable/jquery.nestable",

    "pack:test-nestable/test-nestable")); ?>