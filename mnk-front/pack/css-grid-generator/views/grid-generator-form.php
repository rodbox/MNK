<div class="portlet-padding">
<?php
form::iform("pack-exec:css-grid-generator/grid-generator-create .onLiveReplace");
form::toggle("fluid_col","fluid",true,true);?>
<br>
<?php 
form::text("pageX","page en X","1");?>
<br>
<?php 
form::text("nb_col","colonnes","15");?>
<br>


<?php 
form::text("pad_col","padding ingrid","5");?>
<br>

<?php 
form::text("marg_grid","margin grid","10");?>
<br>
<?php 
form::text("nb_line","ligne","9");?>
<hr>
<?php 
form::submit("envoyer","envoyer",array("class"=>"big btn green plus"));

form::formOut();
?></div>