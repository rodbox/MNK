<?php extract($d); ?>
<div class="tile bg-<?php echo $color.' '.$class; ?>">
	<div class="tile-body">
		<?php echo $content; ?>
	</div>
	<div class="tile-object">
		<div class="name"> <?php echo $title; ?> </div>
		<div class="number"> <?php echo $number; ?> </div>
	</div>
</div>