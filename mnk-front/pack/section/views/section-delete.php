<?php form::iform("pack-exec:section/section-delete");

$optSectionList[] = "";
foreach ($d as $key => $value) {
	$section = str_replace(".json","",basename($value));

	$optSectionList[$section ] = $section;
}
form::select("section-list",$optSectionList,"",$_GET['title_project'],array("class"=>"big","id"=>"section-list-delete"));
form::submit("supprimer","supprimer");
form::formOut();?>
