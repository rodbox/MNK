<div class="row-fluid">
	<div class="span4 offset1">
	<?php 
	metro::portlet("xls","file-excel","4","pack:thief/file-list","scan-list");
?>
	</div>

	<div class="span4 offset1">
	<?php 
	metro::portlet("Scanner","table","24","pack:thief/form-scan");
?>
	</div>
</div>
<?php mnk::css("pack:thief/thief"); ?>
<?php mnk::js("pack:thief/thief"); ?>