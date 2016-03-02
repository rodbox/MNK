
<div class="color-list portlet-padding grib <?php echo (!isset($d["palette"]))?"new-palette":""; ?>">
<div class="content">
  <div class="header">
    <a href="#" class="expand"><?php ui::img("arrow8",16,"000"); ?></a>
  </div>
<?php form::iform("pack-exec:css-color-generator/save-palette "); ?>
<?php form::text("title","",$d['title'],array("class"=>"palette-title")); ?>
<div class="footer alpha_4 alpha_hover">
<span class="left">
  <?php form::submit("create","save"); ?>
</span>
<span class="right">
  <?php mnk::ilink("pack-exec:css-color-generator/css-ui-export","",array("title"=>$d['title'])); ?>
  <?php form::button("css","css"); ?>
  <?php mnk::linkOut(); ?>
</span>
</div>
<div class="center">
    <a href="#" class="addColor alpha_4 alpha_hover">Ajouter une couleur</a>
</div>
	<ul class="palette">

        <?php foreach ($d["palette"]["name"] as $key => $value): ?>
        <li>
           <?php 
           $i++;
           form::text("color-value[]","<span class='small'>".$i.".</span>",$value,array("style"=>"background-color:".$value."; color:".$value.";","class"=>"color-picker"));
           ?> 
           <?php form::text("color-name[]","",$key);?>  
           <span class="small hoverShow"><a href="#" class="delete-color alpha_4">&nbsp;</a></span>
       </li>
   <?php endforeach ?>

</ul>

<?php form::formOut(); ?>
</div></div>