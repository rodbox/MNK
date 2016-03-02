<?php 
	extract($d); 

	$id 	= (!isset($d["id"]))?"new-type-3":$d["id"];
	$title 	= (!isset($d["title"]))?"":$d["title"];
	$model 	= (!isset($d["id"]))?"rocket-param-model ":"";
	$reldraw 	= (!isset($d["reldraw"]))?"":$d["reldraw"];
	$reldraw_child 		= (!isset($d["reldraw_child"]))?"":$d["reldraw_child"];
	$reldraw_parent 	= (!isset($d["reldraw_parent"]))?"":$d["reldraw_parent"];
	$style 	= (!isset($d["style"]))?"":$d["style"];
	$toggleMe 	= (!isset($d["toggleMe"]))?"":$d["toggleMe"];
	$toggleGroup 	= (!isset($d["toggleGroup"]))?"":$d["toggleGroup"];
$view_form=(!isset($d["view_form"]))?"":$d["view_form"];
	$view_input=(!isset($d["view_input"]))?"":$d["view_input"];
	$view_menu=(!isset($d["view_menu"]))?"":$d["view_menu"];
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
		"type"		=>3,
		"hookBg"	=>"18",
		"typeLink"	=>"free"
		);
	 mnk::iview("pack:rocket-v2/model-type-header","",$param); 
 ?>
	<div class="mnk-tabulator">
		<div class="menu-mini">
			<ul>
				<li><a href="#speed-param-info" class="speed-param-info mnk-tab-link"><?php ui::imgSVG("info"); ?></a></li>
				<li><a href="#param-view" class="mnk-tab-link"><?php ui::imgSVG("eye"); ?></a></li>
				<li class="to-right"><a href="#clone-le" class="clone-me"><?php ui::imgSVG("copy"); ?></a></li>
			</ul>
		</div>
		<div class="toggle-next-target">
			<div class="mnk-tabs-list">
				<div class="speed-param-info mnk-tab">
					<?php 
						form::textIco("type-info","bubble-quote","Info",$helper);
						form::textIco("type-msg-true","bubble-check","Valid msg",$msg_true);
						form::textIco("type-msg-false","bubble-blocked","Error msg",$msg_false);
						form::textIco("type-reg","checkbox-checked2","Reg Exp",$reg);
						mnk::ilink("pack-view:regexp/eval .modal-regexp","Edit"); 
					?>
				</div>
				<div class="param-view mnk-tab">
					<?php mnk::iview("pack:rocket-v2/pointer-viewer","",$d); ?>
				</div>
			</div>
		</div>
	</div>
</div>