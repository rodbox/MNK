<input name="contact-firstname" type="text" value="" placeholder="Prénom"/>
<input name="contact-lastname" type="text" value="" placeholder="Nom"/>

<?php
    $label = "<label for='".$id."' style=\"display=none;\">";
    $label .= "<span class='small'>".$id."</span> ";
    $label .= $title;

    if (isset($multiple)&&$multiple=="true") {
        $helper .= "<hr>";
		$helper .= ' * champ multiple avec séparateur " <strong>;</strong> "';
		echo " <strong>*</strong>";
	}

	$label .= "</label>";
	echo "<input value='' name='".$id."' help='".$helper."' type='text' placeholder='".$title."' />";
    shareData();
?>
