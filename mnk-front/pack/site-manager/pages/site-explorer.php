<div class="row-fluid">
	<div class="span6">
<?php metro::portletLightIn(); ?>

<?php mnk::iview("pack:site-manager/site-explorer","site-explorer-scan"); ?>
<?php metro::portletOut(); ?>

</div></div>

<script>


//$("body").addClass('protect');

jQuery(document).ready(function($) {
	$(window).on('beforeunload', function() {

		if ($("body").hasClass('protect'))
			return 'Your own message goes here...';
		else
			return null;
});
});


</script>