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

?>
<textarea name="<?php echo $id;  ?>" id="<?php echo $id;  ?>"  help="<?php echo $helper; ?>" > </textarea>