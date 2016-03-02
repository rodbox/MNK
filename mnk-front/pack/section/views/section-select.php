<form action="<?php echo WEB_ROOT.$_SERVER["REQUEST_URI"]; ?>">
<?php 
$optSectionList[] = "";
foreach ($d as $key => $value) {
	$section = str_replace(".json","",basename($value));

	$optSectionList[$section ] = $section;
}
form::select("section-list",$optSectionList,"",$_GET['title_project'],array("class"=>"big","id"=>"section-list"));
?> 

</form>