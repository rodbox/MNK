	<a href="#" class="calendar" data-toggle="dropdown">
		<div class=" day rotate-270 "><?php mnk::dayFr(date("w"),true); ?></div>
		<div class=" dayNumber"><?php echo date("d"); ?></div>
		<div class=" monthYear">
			<span class="month"><?php mnk::monthFr(date("n")); ?></span><br>
			<span class="year small"><?php echo date("Y"); ?></span>
		</div>
	</a>
	<ul class="  ">
		<li>
			<div id="calendar"></div>
		</li>
	</ul>