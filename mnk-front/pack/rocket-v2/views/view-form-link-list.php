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
<input class="big padding-25 c-2 w-100" id="speed-search" rel=".shortcut"/>
<div class="left">
    <?php $i =1; foreach ($json as $key => $value): ?>
        <div class="shortcut padding-25">
        <span class="small alpha_3"><?php echo $i++;?></span>
        <a href="<?php echo $value; ?>" target="_blank" class="big"><span class="contact check-for"><?php echo $value; ?></span></a>
        </div>
    <?php endforeach ?>
</div>