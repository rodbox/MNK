<?php
	session_start();
	include("mnk-front/pack/app/app-config.php");
	include("mnk-front/pack/app/app-controller.php");
	include("mnk-front/pack/app/app-db.php");
	include("mnk-front/pack/app/app-ui.php");
	include("mnk-front/pack/app/app-user.php");

	extract($_GET);
	extract($_POST);

	$app 		= new app($project,$func);
	$user = new user($app);
?>
<!doctype html>
<html lang="fr">
	<head>
<link rel="stylesheet" href="http://metronic.excentrik.fr/mnk-front/pack/app/css/app.css"/>
<link rel="stylesheet" href="http://metronic.excentrik.fr/mnk-front/pack/app/css/color-ui.css"/>
<link rel="stylesheet" href="http://metronic.excentrik.fr/mnk-front/pack/app/css/grid.css"/>
<link rel="stylesheet" href="http://metronic.excentrik.fr/mnk-front/pack/app/css/breakpoint-grid.css"/>
<link rel="stylesheet" href="http://metronic.excentrik.fr/mnk-front/pack/app/css/app-fix.css"/>



<link rel="icon" type="image/png" href="http://metronic.excentrik.fr/mnk-front/pack/app/img/favicon.png" />

<meta name="viewport" content="user-scalable=no " />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-touch-fullscreen" content="yes">
<!-- For iOS web apps -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">






<!-- link the app icons that will be shown on the home screen (iPhone, iPhone4 and iPad) -->
	<link rel="apple-touch-icon" href="http://metronic.excentrik.fr/mnk-front/pack/app/img/touch-icon-ipad-retina.png" />

<!-- iPad (Retina, portrait) -->
<link href="http://metronic.excentrik.fr/mnk-front/pack/app/img/Default-Portrait.png" media="(device-width: 768px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

<script src="http://metronic.excentrik.fr/mnk-include/core/js/jquery.js"></script>
<script src="http://metronic.excentrik.fr/mnk-include/core/js/jquery.mnk-liveexec.js"></script>

<script src="http://metronic.excentrik.fr/mnk-front/pack/app/js/app-exec.js"></script>
<script src="http://metronic.excentrik.fr/mnk-front/pack/app/js/app.js"></script>

<script src="http://metronic.excentrik.fr/mnk-front/theme/metronic/template_content/assets/plugins/gritter/js/jquery.gritter.min"></script>

<?php $app->appJS();?>
<?php $app->appCSS();?>

	<meta charset="UTF-8" />
	<title>App : <?php echo $project."/".$func;  ?></title>
</head>
<body class=" container_15 app-<?php echo $project."_".$func;  ?> <?php echo $app->app_class;  ?>" id="app">
<div id="app-ref" class="small c-2"><?php echo $project."/".$func; ?></div>

<!-- <img src="http://metronic.excentrik.fr/mnk-front/pack/app/img/Default-Portrait.png" alt="" id="startup"> -->
	<?php //$user->userMenu()  ?>
	<?php $app->appMenu(); ?>
	<a href="http://metronic.excentrik.fr/mnk-front/exec/session_changer.php" id="toggle-helper" class="<?php echo $_SESSION['toggle-helper'];  ?> toggle-me"> </a>
	<a href="http://metronic.excentrik.fr/mnk-front/exec/session_changer.php" id="toggle-timer" class="<?php echo $_SESSION['toggle-timer'];  ?> toggle-me"> </a>
		<div class="top_1 line_1 c-4  grid_5 push_5 align-center ">
		<?php if ($app->success): ?>
			<div class="app-header">
			<h1>- <?php echo $app->title;  ?> -</h1>
			<h2 class="normal border-pointer border-solid border-bottom-4"><?php echo $app->subTitle;  ?></h2>
		</div>
			<div class="app-content <?php echo $app->padding;  ?>">
				<form action="#" javascript='<?php echo $app->func; ?>' class="app" autocomplete="off"  >
					<input type="hidden" class="pointer" name="pointer" value='<?php echo json_encode($app->pointer);  ?>'/>
					<?php $app->appList();  ?>
					<div class="app-form-footer">
						<button class="bg-0 c-5"><?php echo $app->actionName;  ?></button>
					</div>
				</form>
		</div>
		<?php else :  ?>
		<?php $app->error();  ?>
		<?php endif ?>
		<div id="console">
			<div id="wsize"></div>
			<div id="portrait" class="media-queries-info">portrait</div>
			<div id="landscape" class="media-queries-info">landscape</div>
		</div>
	</body>
</html>
