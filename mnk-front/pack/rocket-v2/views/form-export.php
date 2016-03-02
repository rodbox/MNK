<h1>Enregistrer</h1>
<?php form::text("rocket-file","Nom du fichier",$_GET["filename"]); ?>
<?php $evalShare = ($_GET["share"]=="true")?true:false;  ?>
<?php form::toggle("rocket-file-share","partager",true,$evalShare); ?>
<hr/>
<?php mnk::ilink("pack-exec:rocket-v2/rocket-export #rocket-param-rocket"); ?>
<button><?php ui::imgSVG("rocket",16)?> Enregistrer</button></a>