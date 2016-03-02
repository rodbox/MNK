<?php  form::iform("pack-exec:draw/draw-save #draw-save","POST");
ui::img("disk","16");

form::text("filename");
$opt =  array(
"svg"=>"svg",
"png"=>"png",
"jpg"=>"jpg"
);

form::select("type",$opt);
form::submit("Save","Save"); 
form::formOut();
?>