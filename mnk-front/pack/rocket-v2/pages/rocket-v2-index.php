<div class="row-fluid">
	<div class="span12">

	<table class="table">
		<thead>
			<tr><th colspan="4">
			
				<div id="paramActive" class="small">0</div>
				<input type="hidden" id="funcActive"/>
				<input type="hidden" id="paramReq"/>
			</th></tr>
			<tr>

				<th>func</th>
				<th>result</th>
				<th>exec</th>
			</tr>
		</thead>
		<tbody>
			<tr>

				<td><div id="func"></div></td>
				<td><div id="result"></div></td>
				<td><div id="exec"></div></td>
			</tr>
		</tbody>
	</table>

	
	</div>
</div>
<?php mnk::iview("pack:rocket-v2/rocket-input"); ?>
<?php mnk::css("pack:rocket-v2/rocket-v2"); ?>
<?php mnk::js("pack:rocket-v2/rocket-v2"); ?>

<script>
// 	$(document).ready(function() {
// 	$('input.rocket-launcher').mnkRocket({
// 	url : "http://metronic.excentrik.fr/mnk-users/0/rocket-2/rocket-params.json"
// })
</script>
