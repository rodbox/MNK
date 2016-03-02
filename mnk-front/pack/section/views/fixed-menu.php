	<div class="fixed-menu autoScroll">
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
  <li>
		<a href="#<?php echo $d["id"][$key]; ?>"><?php echo $d["title"][$key]; ?></a>
</li>


	<?php endforeach ?>
	</ul>
	</div>