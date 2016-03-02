<div class="row-fluid">
	
	 <div class="span4">
	 	<?php metro::portlet("Core","brain","midnight","pack:doc/doc-func-table","doc-core-func-list"); ?>
	 </div>
	 <div class="span4">
	 	<?php metro::portlet("mod","puzzle4","blue","pack:doc/doc-mod-list","doc-mod-func-list",array("mod"=>$mod)); ?>
	 </div>
	 <div class="span4">

		<?php metro::portlet("Constant","radio-checked","dark","pack:doc/doc-constant-table","doc-constant-list");

	 ?></div>
</div>
<?php  ?>