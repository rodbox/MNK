<?php 
extract($send);
$src = DIR_ADMIN.'/result/'.$tmp.'/snippets/'.$snippetName;
$xmlStr = file_get_contents($src);
$xmlObj = simplexml_load_string($xmlStr);


//mnk::debug($xmlObj);
$d['tmp']	 = $tmp;
$d['snippetName'] = $snippetName;
$d['TRIGGER'] =  $xmlObj->tabTrigger;
$d['CONTENT'] =  $xmlObj->content;
$d['DESC'] =  $xmlObj->description;
?>