<?php //rodheamnk::css("pack:circle-nav/circle-nav"); ?>
<?php mnk::js("pack:circle-nav/circle-nav"); ?>
<div class="row-fluid">
	<div class="span12">
	
	<button class="open circle-open" rel="#circle-0">open</button>
	<ul class="circle-nav" id="circle-0">
		<li>1</li>
		<li><button class="open circle-open" rel="#circle-2">2</button>
			<ul class="circle-nav" id="circle-2">
				<li>2.1</li>
				<li>2.2</li>
				<li>2.3</li>
				<li>2.4</li>
				<li>2.1</li>
				<li>2.2</li>
				<li>2.3</li>
				<li>
					<button class="open circle-open" rel="#circle-24">2.4</button>
					<ul class="circle-nav" id="circle-24">
						<li>2.4.1</li>
						<li>2.4.2</li>
						<li>2.4.3</li>
						<li>2.4.4</li>
						
					</ul>


				</li>
			</ul>
		</li>
		<li>3</li>
		<li>4</li>
		<li>1</li>
		<li>2</li>
		<li>3</li>
		<li>4</li>
		<li>1</li>
		<li>2</li>
		<li>3</li>
		<li>4</li>
	</ul>

	</div>
</div>