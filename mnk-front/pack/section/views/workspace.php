<fieldset>
	<legend>
		Preview
	</legend>

<?php 



form::text("title_project","",$_GET["title_project"]); ?>
<?php mnk::ilink("pack-view:section/div-section #addSection"); ?>
	<div class="add-section center c-1 bg-25">
		<?php ui::img("plus",32,"fff"); ?>
	</div>
</a>
<div id="grid-view">
	<ul>

	<?php foreach ($d["id"] as $key => $value): ?>
<?php
		$data = array(
			"id" => $d["id"][$key],
			"title" => $d["title"][$key],
			"class" => $d["class"][$key],
			"style" => $d["style"][$key],
			"pack" => $d["pack"][$key],
			"pack-page" => $d["pack-page"][$key]
			);
  ?>
		<?php mnk::iview("pack:section/div-section","",$data); ?>



	<?php endforeach ?>
	</ul>
</div>
</fieldset>