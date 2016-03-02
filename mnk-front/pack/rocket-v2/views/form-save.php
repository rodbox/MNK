<h1>Enregistrer</h1><hr/>
<?php form::text("rocket-file","Nom du fichier",$_GET["filename"]); ?>
<?php form::toggle("rocket-file-share","partager",true,true); ?>
<hr/>
<?php mnk::ilink("pack-exec:rocket-v2/rocket-v2-save #rocket-param-save"); ?><button>
<?php ui::imgSVG("disk",16)?>Enregistrer</button></a>
