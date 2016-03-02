<div class="header padding_15">
<h2><?php echo $_GET["site"]; ?></h2></div>
<div class="menu">
<?php mnk::ilink("null:# .toggleCheckAll",mnk::spacer()); ?> 

<?php 

metro::modalLinkMini("FTP","storage2","FTP");

 ?>

 <?php mnk::ilink("pack-exec:site-manager/site-scan-refresh #scan-refresh",ui::rimg("loop4",12),array("site"=>$_GET['site'])); ?>
 <div class="right">
 	<div class="hover">
 		<?php ui::img("file-zip",12,"000"); ?>
 		<div class="toggle">
<?php mnk::iview("pack:site-manager/select-site-save","site-save-list",array("site"=>$_GET['site'])); ?>
</div></div>

 <a href="<?php echo WEB_SITE_META_FILES."/".$_GET['site']."/sftp-config.json" ?>"><?php img::packSimg("site-manager/sublime-text.png"); ?></a>
<a href="<?php echo WEB_SITE_META_FILES."/".$_GET['site']."/filezilla.xml" ?>"><?php img::packSimg("site-manager/filezilla.png"); ?></a>
</div>

<?php 
metro::modal("FTP","FTP","pack:site-manager/ftp-config","ftp-config");
?>
<?php
function explore($array,$filter="",$prev="",$root=true){
	$class= ($root)?"open":"";

	echo "<ul class='folder " . $class . "' >";
		foreach ($array as $key => $value){
			echo "<li>";
				if(is_array($value)){
					$dirValue  = $prev."/".$key;

					
					if (in_array($dirValue,$filter)){
						$checked = "checked";
						$bol 	= true;
					}
					else {
						$checked = "";
						$bol 	= false;
					}

					echo "<div class='title folder-title ".$checked."'>";
					form::check("file[]","",$dirValue,$bol);
					mnk::ilink("null .toggle-expand",mnk::spacer());
					echo "<span class='folder-name'>";
					echo $key;
					echo "</span>";
					echo " <span class='small c-green1'>";
					echo count($value);
					echo "</span>";

					echo "</div>";
					explore($value,$filter,$dirValue,false);
				}
				else {
					$dirValue  = $prev."/".$value;

					if (in_array($dirValue,$filter)){
						$checked = "checked";
						$bol 	= true;
					}
					else {
						$checked = "";
						$bol 	= false;
					}
						
					echo "<div class='title ".$checked."'>";
					form::check("file[]","",$dirValue,$bol);
					echo "<span class='file-name'>";
					echo $value;

					echo "</span>";
					echo "</div>";
				}
			echo "</li>";

		}
	echo "</ul>";
} ?>


<?php form::iform("pack-exec:site-manager/site-filter-save #site-filter-save");?>
<?php form::hidden($_GET['site'],"site");

form::hidden($d['filter'],"filter");

$filterFile = json_decode($d['filter'],true);
$filter = $filterFile['file']['file'];
?>

<?php explore($d["scan"],$filter); ?>
<div class="footer padding_15">
<?php form::submit("save","save"); ?> 
<?php mnk::ilink("pack-exec:site-manager/site-save","",array("site"=>$_GET["site"]),array("class"=>"onLive")); ?>

<?php form::button("zip","zip"); ?>
	</a>

</div>
<?php form::formOut();?>