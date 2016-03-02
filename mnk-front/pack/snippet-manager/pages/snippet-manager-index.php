<div class="row-fluid">


	<div class="span8 dark-zone">

<!-- 
<?php metro::portletIn("Editeur","code","grey"); ?> -->
<?php 
$data["id"]	= "";
$data["tabs"] =array(
	array(
		"title"=>"Manuel",
		"view"=>"pack:snippet-manager/snippet-editor"
	),
	array(
		"title"=>"Scan une chaine",
		"view"=>"pack:snippet-manager/snippet-scan-string"
	),
	array(
		"title"=>"Scan une fichier",
		"view"=>"pack:snippet-manager/snippet-scan-file"
	)
	);

metro::tab($data); ?>


<!-- 	<?php metro::portletOut();?> -->
	</div>
	<div class="span4">
		<?php metro::portletLight("Snippet","pack:snippet-manager/snippet-list","snippet-list"); ?>
	</div>
</div>
<?php 
mnk::js(array(
        "pack:carret-postion/selection_range",
        "pack:carret-postion/string_splitter",
        "pack:carret-postion/cursor_position",
        "pack:carret-postion/jquery.caretpixelpos",
	"pack:carret-postion/script"
	));
     ?>
