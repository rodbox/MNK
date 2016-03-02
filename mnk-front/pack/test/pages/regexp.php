<?php mnk::js("pack:test/regexp"); ?>
<?php mnk::css("pack:test/test"); ?>
<div class="row-fluid">
	<div class="span3">
		<div class="evalReg">
			<?php form::text("strFind","","mang",array("id"=>"strFind")); ?>
		</div>
		<div class="resultList"></div>
	</div>
	<div class="span6">
		<?php form::text("regexp","","[a-zA-Z-]{0,}"); ?>
		<div class="resultExp"></div>
		<div class="resultExplode"></div>
	</div>
</div>