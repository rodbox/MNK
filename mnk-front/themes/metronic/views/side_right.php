<div class="side-right open" id="<?php echo $d['id']; ?>">
	<div class="toggle-side-right bg-<?php echo $d['color']; ?>">
		<span class="stick"></span>
		<a href="#" class="toggle-side-link">
		<?php ui::img($d['icon'],16,"fff"); ?>
		</a>
	</div>
	<div class="side-right-content">



		<?php mnk::iview($d['view'],$d['model']); ?>
	</div>
</div>