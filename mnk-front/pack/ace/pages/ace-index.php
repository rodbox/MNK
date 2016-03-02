<?php 

mnk::iview("pack:ace/editor");
 mnk::js("pack:ace/ace");
   mnk::js("pack:ace/mode-javascript"); 
   mnk::js("pack:ace/mode-php"); 
  mnk::js("pack:ace/theme-twilight"); 
 mnk::js("pack:ace/jquery-ace.min"); 

?>
<script>
alert("jkljlk");
	$('#my-code-area').ace({ theme: 'twilight', lang: 'javascript' });	
</script>