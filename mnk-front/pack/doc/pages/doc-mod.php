<?php extract($_GET); ?>
<?php mnk::iview("pack:doc/doc-mod-list-select","doc-mod-list"); ?>
<div class="row-fluid">
	
	<div class="span8 offset2">
		
	 	<?php metro::portlet("mod","puzzle4","blue","pack:doc/doc-mod-list","doc-mod-func-list",array("mod"=>$mod)); ?>
	 </div>
</div>

