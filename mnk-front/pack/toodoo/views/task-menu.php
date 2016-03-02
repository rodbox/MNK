<div class="menu ">
	<?php mnk::ilink("pack-exec:toodoo/task-add #task-add-toggle",ui::rimg("plus",12,"fff")); ?>
	<?php mnk::ilink("pack-exec:toodoo/task-del #task-del",ui::rimg("remove8",12,"fff")); ?>
</div>
<div class="task-add-zone">
	<?php form::iform("pack-exec:toodoo/task-add #task-add","POST");?>
	<?php form::iform("pack-exec:toodoo/task-add");?>
	<textarea name="taskAdd" id="" cols="30" rows="10"></textarea>
	<?php form::formOut();?>
</div>