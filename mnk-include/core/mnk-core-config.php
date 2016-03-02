<?php 

$_SESSION['curLang'] = (!isset($_SESSION['curLang']))?"FR":$_SESSION['curLang'];

chdir(dirname(__FILE__));


define ('WEB_ROOT'			, "http://metronic.excentrik.fr");
define ('WEB_BETTY'		, "http://betty.excentrik.fr");
define ('DIR_BETTY'		, str_replace('\\', '/', realpath("../../../betty.excentrik")));

define ('WEB_STATIC'		, "http://static.excentrik.fr");
define ('DIR_STATIC'		, str_replace('\\', '/', realpath("../../../../static/")));


//PATH
define ('ABSPATH'			, str_replace('\\', '/', realpath("../..")));
define ('ABSPATH_FRONT'		, str_replace('\\', '/', realpath("../..")));

define ('DIR_ROOT'			, ABSPATH);

define ('WEB_UI'			, WEB_BETTY.'/mnk-include/core/img/ui');
define ('DIR_UI'			, DIR_BETTY.'/mnk-include/core/img/ui');

define ('DIR_UI_SVG'		, DIR_ROOT.'/mnk-include/core/img/svg');
define ('WEB_UI_SVG'		, WEB_ROOT.'/mnk-include/core/img/svg');

define ('WEB_SAVE'			, WEB_ROOT.'/mnk-include/save');
define ('DIR_SAVE'			, DIR_ROOT.'/mnk-include/save');

define ('WEB_ADMIN'			, WEB_ROOT.'/mnk-admin');
define ('DIR_ADMIN'			, ABSPATH.'/mnk-admin');

define ('DIR_PACK'      	, DIR_ROOT.'/mnk-front/pack');
define ('WEB_PACK'      	, WEB_ROOT.'/mnk-front/pack');

define ('DIR_THEME_LIST'	, ABSPATH.'/mnk-front/themes');
define ('WEB_THEME_LIST'	, WEB_ROOT.'/mnk-front/themes');
define ('DIR_THEME'			, DIR_THEME_LIST);
define ('WEB_THEME'			, WEB_THEME_LIST);

define ('DIR_FRONT_UPLOAD'  , ABSPATH.'/mnk-front/upload');
define ('WEB_FRONT_UPLOAD'  , WEB_ROOT.'/mnk-front/upload');

define ('DIR_INCLUDE'  		, ABSPATH.'/mnk-include');
define ('WEB_INCLUDE'  		, WEB_ROOT.'/mnk-include');

define ('DIR_UPLOAD'    	, ABSPATH.'/mnk-front/upload');
define ('WEB_UPLOAD'    	, WEB_ROOT.'/mnk-front/upload');

define ('DIR_USER'    		, DIR_ROOT.'/mnk-users');
define ('WEB_USER'    		, WEB_ROOT.'/mnk-users');

define ('DIR_USER_ROOT'    		, DIR_ROOT.'/mnk-users/0');
define ('WEB_USER_ROOT'    		, WEB_ROOT.'/mnk-users/0');

define ('DIR_GAL'           , DIR_UPLOAD."/gal");
define ('WEB_GAL'           , WEB_UPLOAD."/gal");



//TEMP
define ('DIR_TMP'          , ABSPATH.'/tmp');
define ('WEB_TMP'          , WEB_ROOT.'/tmp');


define ('DIR_SNIPPETS'           , DIR_TMP."/snippets");
define ('WEB_SNIPPETS'           , WEB_TMP."/snippets");




// dossier des documents de model de structure de dossier et de fichier
define ('DIR_TEMPLATE'      , ABSPATH.'/mnk-include/template');
//PACK MODEL MVC
define ('PACK_MODEL'    	, DIR_TEMPLATE.'/pack');

//CORE MVC
define ('CORE'    			, ABSPATH.'/mnk-include/core');




//PACK INSTALL TEMP
define ('PACK_TMP'          , ABSPATH.'/mnk-admin/tmp/pack_tmp');

//DIVERS
define ('IMG_FOLDER'		, 'mnk-content/img');

define ('DIR_PAGE_INC'    	, ABSPATH.'/mnk-content/pages');
define ('DIR_PAGE_CACHE_INC', ABSPATH.'/mnk-content/pages/'.$_SESSION['curLang'].'/cache');
define ('DIR_PAGE_FRONT_INC', ABSPATH_FRONT.'/pages');
define ('DIR_ROOT_FRONT'	, $_SERVER['DOCUMENT_ROOT']);

//	define ('DIR_JS_FOLDER'         	, DIR_ABS_THEME.'/js');




// page include introuvable
define ('ERROR_PAGE'		, ABSPATH.'/mnk-front/content/pages/error_inc.php');

// page include introuvable
define ('DEFAULT_PAGE'		, ABSPATH.'/mnk-content/pages/'.$_SESSION['curLang'].'/home.php');

define ('CORE_JS'			, WEB_ROOT.'/mnk-include/core/js');



//CSS
define ('SPACER'			, WEB_ROOT.'/mnk-include/core/img/spacer.gif');
define ('CORE_CSS'			, WEB_ROOT.'/mnk-include/core/css');


//controller
define ('LOADER_CONTROL'	, WEB_ROOT.'/mnk-include/load.php');
define ('LOADER_CONTROL_ABS'		, ABSPATH.'/mnk-include/load.php');

//live loader
define ('LOADER_INC'		, WEB_ROOT.'/mnk-content/pages/mnk-loader.php');








// //JQUERY

// define ('JQUERY_JS'			, WEB_STATIC.'/js/last-jquery.js');
// define ('JQUERY_UI_JS'		, WEB_STATIC.'/js/ui/js/jquery-ui-1.8.16.custom.min.js');
// define ('JQUERY_UI_CSS'		, WEB_STATIC.'/js/ui/css/custom-theme/jquery-ui-1.8.16.custom.css');

// insertion de tout les logs aux differentes bases de données.
//require(DB_LOG_FILE);
?>
