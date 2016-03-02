<?php 
	extract($d); 

	$id 	= (!isset($d["id"]))?"new-type-4":$d["id"];
	$title 	= (!isset($d["title"]))?"":$d["title"];
	$model 	= (!isset($d["id"]))?"rocket-param-model ":"";
	$reldraw 	= (!isset($d["reldraw"]))?"":$d["reldraw"];
	$reldraw_child 		= (!isset($d["reldraw_child"]))?"":$d["reldraw_child"];
	$reldraw_parent 	= (!isset($d["reldraw_parent"]))?"":$d["reldraw_parent"];
	$style 	= (!isset($d["style"]))?"":$d["style"];
	$toggleMe 	= (!isset($d["toggleMe"]))?"":$d["toggleMe"];
	$toggleGroup 	= (!isset($d["toggleGroup"]))?"":$d["toggleGroup"];
	$param_url 	= (!isset($d["param_url"]))?"":$d["param_url"];
	$param_view 	= (!isset($d["param_view"]))?"":$d["param_view"];
	$multiple 	= (!isset($d["multiple"]))?false:$d["multiple"];
	$multiple=($multiple=="true")?true:false;
	$view_form=(!isset($d["view_form"]))?"":$d["view_form"];
	$view_input=(!isset($d["view_input"]))?"":$d["view_input"];
	$view_menu=(!isset($d["view_menu"]))?"":$d["view_menu"];
	$pointer=(!isset($d["pointer"]))?"":$d["pointer"];
	$param = array(
		"id"		=>$id,
		"title"		=>$title,
		"reldraw"	=>$reldraw,
		"reldraw_child"	=>$reldraw_child,
		"reldraw_parent"=>$reldraw_parent,
		"style"		=>$style,
		"model"		=>$model,
		"toggleMe"	=>$toggleMe,
		"toggleGroup"=>$toggleGroup,
		"type"		=>4,
		"hookBg"	=>"12",
		"typeLink"	=>"link"
		);
	 mnk::iview("pack:rocket-v2/model-type-header","",$param); 
 ?>
	<div class="mnk-tabulator">
		<div class="menu-mini">
			<ul>
				<li><a href="#speed-param-info" class="speed-param-info mnk-tab-link"><?php ui::imgSVG("info"); ?></a></li>
				<li><a href="#pointer-param-info" class="mnk-tab-link"><?php ui::imgSVG("code"); ?></a></li>
				<li><a href="#param-view" class="mnk-tab-link"><?php ui::imgSVG("eye"); ?></a></li>
				<li class="to-right"><a href="#clone-le" class="clone-me"><?php ui::imgSVG("copy"); ?></a></li>
			</ul>
		</div>
		<div class="toggle-next-target">
			<div class="mnk-tabs-list">
				<div class="speed-param-info mnk-tab">
					<?php form::toggle("multiple","",true,$multiple,"multiple","single","25","28");  ?>
					<?php form::textIco("type-info","bubble-quote","Info",$helper); ?>
					<?php form::textIco("param-url","link","http://",$param_url); ?>

				</div>
				<div class="pointer-param-info mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-convert","",$pointer); ?>

				</div>
				<div class="param-view mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-viewer","",$d); ?>
				</div>
			</div>
		</div>
	</div>
</div>