<?php extract($d); ?>
  <li><?php mnk::ilink("pack-page:".$pack."/.$page."); ?>
    <?php ui::img($icon,'16', 'fff',array('class' => 'alpha_5')); ?>
    <span class="title"><?php echo $title; ?></span>
    </a>
<?php if (array_key_exists("child", $d)&&$d["child"]!=""): ?>
	    <ul class="sub-menu">
        <?php metro::iview("metro:sidemenu-link","",$d["child"]); ?>
    </ul>
	<?php endif ?>
</li>