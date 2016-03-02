<?php mnk::js("pack:rocket-v2/mnk-linkerdraw"); ?>
<?php mnk::css("pack:rocket-v2/mnk-linkerdraw"); ?>
<?php mnk::css("pack:rocket-v2/mnk-mousemenu"); ?>
<?php mnk::css("pack:rocket-v2/tools-editor"); ?>
<?php mnk::js("pack:rocket-v2/tools-editor"); ?>
<?php mnk::js(array(
    "core:jquery/svg/jquery.svg.min",
    "core:jquery/jquery.event.drag-2.2",
    "core:jquery/jquery.event.drag.live-2.2",
    "core:jquery/jquery.event.drop-2.2",
    "core:jquery/jquery.event.drop.live-2.2"
)); ?>
<?php mnk::css("pack:rocket-v2/rocket-v2-manager"); ?>
<?php mnk::js("pack:rocket-v2/rocket-v2-manager"); ?>
<?php mnk::js("pack:rocket-v2/mnk-mousemenu"); ?>
<?php mnk::js("pack:html-to-canvas/html2canvas"); ?>

<div class="row-fluid">
<?php mnk::iview("pack:rocket-v2/rocket-manager-menu"); ?>
<?php mnk::iview("pack:rocket-v2/rocket-manager-menu-left"); ?>


<div class=" span12">

<?php mnk::iview("pack:rocket-v2/layer"); ?>

<div id="model">
    <?php mnk::iview("pack:rocket-v2/model-type-1"); ?>
    <?php mnk::iview("pack:rocket-v2/model-type-2"); ?>
    <?php mnk::iview("pack:rocket-v2/model-type-3"); ?>
    <?php mnk::iview("pack:rocket-v2/model-type-4"); ?>
    <?php mnk::iview("pack:rocket-v2/model-type-stay"); ?>
    <?php mnk::iview("pack:rocket-v2/model-type-pause"); ?>
    <?php mnk::iview("pack:rocket-v2/model-type-book"); ?>

</div>
<?php mnk::iview("pack:rocket-v2/mouse-menu"); ?>
<?php 

mnk::js(array(
"pack:ace/ace",
"pack:ace/jquery-ace.min",
"pack:ace/mode-javascript",
"pack:ace/mode-php",
"pack:ace/theme-twilight"
));

 ?>
</div>
</div>
<div class="render"></div>