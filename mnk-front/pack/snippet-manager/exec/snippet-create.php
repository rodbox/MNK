<?php 
extract($_POST);

$replace = array(
	"TRIGGER" 	=> $trigger,
	"CONTENT"	=> $content,
	"DESC"		=> $desc,
	"TYPE"		=> $type
	);



$snippet =DIR_SNIPPETS."/".$snippetName.".sublime-snippet";

if (file_exists($snippet))
	unlink($snippet);

file::templateFile("sublime-snippet",DIR_SNIPPETS,$snippetName,$replace,false);




?>
<a href="<?php echo WEB_SNIPPETS."/".$snippetName.".sublime-snippet"; ?>"><?php echo $snippetName; ?></a>