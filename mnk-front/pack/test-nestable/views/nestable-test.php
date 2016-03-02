<div class="span7">



<?php form::iform("pack-exec:root/save-menu #menu-save"); ?>







<hr class="both">
<menu>
<?php mnk::iview("pack:root/menu-list-select","menu-list"); ?>
	<div class="f-right">
	<?php form::submit("save","save"); ?>
	</div>
</menu>
<menu class="sub">
	<a href="#" id="addFolder"><?php ui::img("folder-plus",16,"242424"); ?> </a>
</menu>

<div class="dd" id="nestable">
    <ol class="dd-list">
        <?php metro::iview("pack:root/menu-tree","side-menu"); ?>
    </ol>
</div>
<div>

<hr class="both">

<!-- <textarea id="nestable-output"></textarea>
<textarea id="nestable2-output"></textarea> -->
</div>
<?php form::formOut();?>
</div>
<div class="span4">
    <div class="dd " id="nestable2">
    <?php metro::portletLight("midnight","pack:root/pack-page-tree","all-pack-pages"); ?>



</div>

</div>
</div>




