<?php 
	extract($d); 
		
	$id 			= (!isset($d["id"]))?"new-type-book":$d["id"];
	$title 			= (!isset($d["title"]))?"":$d["title"];
	$model 			= (!isset($d["id"]))?"rocket-param-model ":"";
	$reldraw 		= (!isset($d["reldraw"]))?"":$d["reldraw"];
	$reldraw_child 	= (!isset($d["reldraw_child"]))?"":$d["reldraw_child"];
	$reldraw_parent = (!isset($d["reldraw_parent"]))?"":$d["reldraw_parent"];
	$style 			= (!isset($d["style"]))?"":$d["style"];
	$toggleMe 		= (!isset($d["toggleMe"]))?"":$d["toggleMe"];
	$toggleGroup 	= (!isset($d["toggleGroup"]))?"":$d["toggleGroup"];
	$view_form		= (!isset($d["view_form"]))?"":$d["view_form"];
	$view_input		= (!isset($d["view_input"]))?"":$d["view_input"];
	$view_menu		= (!isset($d["view_menu"]))?"":$d["view_menu"];
	$param = array(
		"id"		=>$id,
		"title"		=>$title,
		"reldraw"	=>$reldraw,
		"reldraw_child"	=>$reldraw_child,
		"reldraw_parent"=>$reldraw_parent,
		"reldraw"	=>$reldraw,
		"style"		=>$style,
		"model"		=>$model,
		"toggleMe"	=>$toggleMe,
		"toggleGroup"=>$toggleGroup,
		"type"		=>"book",
		"hookBg"	=>1,
		"bg"		=>1,
		"color"		=>0,
		"typeLink"	=>"book"
		);
	 mnk::iview("pack:rocket-v2/model-type-header","",$param); 

	 $icoColor = "29";
 ?>
 	<div class="mnk-tabulator">
		<div class="menu-mini">
			<ul>
				<li><a href="#speed-param-info" class="speed-param-info mnk-tab-link"><?php ui::svg("info",16,$icoColor); ?></a></li>
				<li><a href="#param-view" class="mnk-tab-link"><?php ui::svg("eye",16,$icoColor); ?></a></li>
			</ul>
		</div>
		<div class="toggle-next-target">
			<div class="mnk-tabs-list">
				<div class="speed-param-info mnk-tab">
					<?php form::textIco("type-info","bubble-quote","Info",$helper); ?>
				</div>
				<div class="param-view mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-viewer","",$d); ?>
				</div>
			</div>
		</div>
	</div>
</div>