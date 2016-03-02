<?php $json = json_decode(file_get_contents($param_url),true);
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
<div class="left">
    <?php $i =1; foreach ($json as $key => $value): ?>
        <div class="shortcut">
        <span class="small alpha_3"><?php echo $i++;?></span>
		<input value="<?php echo $value;  ?>" name="<?php echo $id;  ?>[]" type="checkbox"><span class="contact check-for"><?php echo $value; ?></span>
        </div>
	<?php endforeach ?>
</div>