<?php extract($d);
$classElem = "rocket-param-edit type-elem elem type-".$type." ". $model." ".$toggleMe." ".$toggleGroup." bg-".$bg." c-".$color." hide ";
$attrElem = array(
	"class"	 => $classElem,
	"id"	 => $id,
	"reldraw"=> $reldraw,
	"style"	 => $style);
?>
<div <?php echo mnk::attr($attrElem);  ?>>
		<h2>
			<input type="hidden" name="type-link" value="<?php echo $typeLink;  ?>"  class="type-link"/>
			<div class="rocket-param-hook-to-parent rocket-param-hook  bg-<?php echo $hookBg;  ?>" reldraw="<?php echo $reldraw_parent;  ?>" id="<?php echo $id;  ?>-toParent" ></div><a href="#" class="toggle-me">&nbsp;</a><a href="#" class="group-linked-toggle">&nbsp;</a>
			<div class="type-id"><?php echo $id;  ?></div>
			<input type="text" name="type-title" value="<?php echo $title;  ?>" class="type-title">
			<div class="rocket-param-hook-to-child rocket-param-hook bg-<?php echo $hookBg;  ?>" reldraw="<?php echo $reldraw_child;  ?>" id="<?php echo $id;  ?>-toChild" >
			</div>
			<a class="bt-resize" href="#"><?php ui::imgSVG("resize",16); ?></a>
		</h2>