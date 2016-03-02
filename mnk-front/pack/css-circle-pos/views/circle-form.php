<fieldset>
	<?php mnk::iview("pack:css-color-generator/palette-list","palette-list"); ?>
</fieldset>
<?php form::iform("pack-exec:css-circle-pos/css-circle-generator .liveform");?>
<?php $maxElem = 30; ?>
<fieldset>
<?php 
	$opt = array(
		"redo"=>" ".ui::rimg("loop5",16),
		
		"random"=>" ".ui::rimg("shuffle2",16)
		// "pingpong"=>" ".ui::rimg("arrow3",16)
		);

form::radio("color-distribute",$opt,"","redo"); ?>
<?php form::range("rotate",ui::rimg("rotate2",16),"0",0,360); ?>
<?php form::range("angle",ui::rimg("compass2",16),"0",0,6275); ?>
<?php form::range("position",ui::rimg("numbered-list",16),1,1,$maxElem); ?>
<?php form::range("radius",ui::rimg("radio-unchecked",16),100,5,500); ?>
<?php form::range("elem",ui::rimg("numbered-list",16),6,1,$maxElem); ?>



<?php form::range("sizeElem",ui::rimg("arrow",16),60,10,220); ?>
</fieldset>
<fieldset>
	<?php form::range("pos-x",ui::rimg("arrow3",16),0,0,1000); ?>
<?php form::range("pos-y",ui::rimg("arrow4",16),0,0,1000); ?>
</fieldset>	
<fieldset>
	<input type="text" name="sub">
<?php form::submit("create","create"); ?>

<div class="response"></div>
<div id="toppathwrap">
    <textarea id="copypath"></textarea>
</div>
</fieldset>
<?php form::formOut();?>
