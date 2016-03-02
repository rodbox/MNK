<?php foreach ($d as $key => $value): ?>
	<?php extract($value); ?>
	<li><?php mnk::ilink("pack-page:".$pack."/".$page); ?>
    <?php ui::img($icon,'16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title"><?php echo $title; ?></span>
    </a>
<?php if (array_key_exists("child", $value)&&$value["child"]!=""): ?>
	    <ul class="sub-menu">
        <?php metro::iview("pack:root/sidemenu-link-list","",$value["child"]); ?>
    </ul>
	<?php endif ?>
</li>
<?php endforeach ?>
  