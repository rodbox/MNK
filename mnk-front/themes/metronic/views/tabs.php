<div class="tabbable tabbable-custom ">
    <ul class="nav nav-tabs">
    	<?php $i = 0; ?>
    	<?php foreach ($d['tabs'] as $key => $value): ?>
    	<?php $i++; ?>
    		  <li <?php echo ($i==1)?"class='active'":""; ?>>
    		  	<a href="#tabs-<?php echo $i; ?>" data-toggle="tab" >
    		  		<?php echo $value["title"]; ?>
    		  	</a>
    		  </li>
    	<?php endforeach ?>
    </ul>
    <div class="tab-content">
    	<?php $i = 0; ?>
		<?php foreach ($d['tabs'] as $key => $value): ?>
		<?php $i++; ?>
    		  <div id="tabs-<?php echo $i; ?>" class="tab-pane <?php echo ($i==1)?"active":""; ?>">
    		  	<?php mnk::iview($value["view"]); ?>
    		  </div>
    	<?php endforeach ?>
    </div>
</div>