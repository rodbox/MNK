<?php 

mnk::css(array("pack:section/section","pack:section/section-grid"));
mnk::js("pack:section/section");
mnk::iview("pack:section/fixed-menu","section-load",array('title_project'=>$_GET['title_project'])); ?>
<div class="row-fluid">
<?php mnk::iview("pack:section/section-page","section-load",array('title_project'=>$_GET['title_project'])); ?></div>