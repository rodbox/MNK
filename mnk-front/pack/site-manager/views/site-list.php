<div class="page-menu">
<?php metro::modalLinkView("web-create","web-create","pack:site-manager/site-creator"); ?>
</div>
<ul>
<?php foreach ($d as $key => $value):?>
	<li>
		<?php ui::img("globe",12,"242424",array("class"=>"alpha_2")); ?> 
	<a href="http://<?php echo basename($value); ?>.fr">

<?php echo basename($value); ?>
	</a>
		</li>



<?php endforeach; ?>
</ul>