<?php $json = json_decode(file_get_contents($param_url),true);
    echo "<label for='".$id."'>";
    echo "<span class='small'>".$id."</span> ";
    echo $title;
    echo "</label>";
?>
<select name="gallery" id="gallery">
    <?php $i =1; foreach ($json as $key => $value): ?>
        <option value="<?php echo $value; ?>">
        <?php echo $value; ?>
        </option>
    <?php endforeach ?>
</select>