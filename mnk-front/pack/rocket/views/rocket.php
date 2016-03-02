<input type="text" class="rocket"/>
<div id="rocket-launcher" class="rocket-list">

	<div id="rocket-fil">
		<input id="active-col" type="hidden" value="1" />
		<a id="col-1-value" href="#col-1"></a>
		<a id="col-2-value" href="#col-2"></a>
		<a id="col-3-value" href="#col-3"></a>
		<a id="col-4-value" href="#col-4"></a>
	</div>
	<div class="rocket-col-container">
		<div id="col-1" class="rocket-col"></div>
		<div id="col-2" class="rocket-col"></div>
		<div id="col-3" class="rocket-col"></div>
		<div id="col-4" class="rocket-col"></div>
	</div>
</div>
<?php mnk::css("pack:rocket/rocket"); ?>
<?php mnk::js("pack:rocket/rocket"); ?>