<?php $json = json_decode(file_get_contents($param_url),true);?>
<div class="grid_25">
<?php app::view("user","sub-menu");?>
<div class="left" id="mail-list">
    <?php $i =1; foreach ($json as $key => $value): ?>
        <div class="shortcut padding-15">
<!--        <span class="small alpha_3"><?php echo $i++;?></span>
        <input value="<?php echo $value;  ?>" name="<?php echo $id;  ?>[]" type="checkbox">-->
        <span class="contact check-for"><?php echo $value; ?></span>
        </div>
    <?php endforeach ?>
</div>
</div>
<div class="grid_75 bg-4 c-3 push_25"><div class="ingrid left"></div></div>