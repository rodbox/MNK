<div class="row-fluid">
	<div class="span12">
	  <img src="http://metronic.excentrik.fr/mnk-front/pack/photos-manager/img/home.jpg" alt="" class="bg-full" style="" />	
	  <center>					
<img src="http://metronic.excentrik.fr/mnk-front/pack/photos-manager/img/logo.png" alt="" class="sticker" style="" />
</center>

	</div>
</div>
<div class="span9">

<div class="grid-sys">
<div class="grid-row">
<div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div></div><div class="grid-row"><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div>
</div><div class="grid-row"><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div>
</div><div class="grid-row"><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div>
</div><div class="grid-row"><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div><div class="grid grid1"></div>
</div>
</div>
</div>
<div class="span2">

<?php mnk::ilink("pack-exec:photos-manager/rotate-minus",ui::rimg("rotate","32")); ?>

<?php mnk::ilink("pack-exec:photos-manager/rotate-plus",ui::rimg("rotate2","32")); ?>



<h1>tag list</h1>

 <ul class="tag-list">
 	<li><?php form::text("new-tag"); ?></li>
 	<li><button class="tag bg-5 c-1" value="tag-1">Mairie</button></li>
 	<li><button class="tag bg-8 c-1" value="tag-2">Eglise Batptème</button></li>
 	<li><button class="tag bg-11 c-1" value="tag-3">Eglise Mariage</button></li>
 	<li><button class="tag bg-16 c-1" value="tag-4">à Midi</button></li>
 </ul><hr class="clear">
 <button class="clear" >Clear</button>
 </div>


<?php mnk::js(array(
	"pack:photos-manager/photos-manager",
	"pack:photos-manager/jquery.event.drag-2.2",
	"pack:photos-manager/jquery.event.drag.live-2.2",
	"pack:photos-manager/jquery.event.drop-2.2",
	"pack:photos-manager/jquery.event.drop.live-2.2"
)); ?>
<?php mnk::css("pack:photos-manager/photos-manager"); ?>