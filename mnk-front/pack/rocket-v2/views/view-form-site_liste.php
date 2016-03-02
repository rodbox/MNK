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

<select name="e25" id="e25">
<?php 
foreach($json as $key => $val){
    echo "<option value='".$val."'>";
    echo $val;
    echo "</option>";
    }

?>
</select>