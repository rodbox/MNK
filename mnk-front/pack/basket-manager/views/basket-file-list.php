<ul class="filelist">
<?php foreach ($d as $key => $value): ?>
	<tr>

		<li><?php
		form::hidden($value);

		 echo $value; ?>
		</li>
	
<?php endforeach ?>
</ul>