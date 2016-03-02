<?php
    echo "<label for='".$id."'>";
    echo "<span class='small'>".$id."</span> ";
	echo $title;

	if (isset($multiple)&&$multiple=="true") {
		$helper .= "<hr>";
		$helper .= ' * champ multiple avec séparateur " <strong>;</strong> "';
		echo " <strong>*</strong>";
	}

	echo "</label>";
	echo "<input value='' name='".$id."' help='".$helper."' type='text' />";
?>
<div class="result"></div>