<?php

// Load the local Craft environment
if (file_exists('../.env.php'))
	require_once '../.env.php';


// Default environment
if (!defined('CRAFT_ENVIRONMENT'))
	define('CRAFT_ENVIRONMENT', getenv('CRAFTENV_CRAFT_ENVIRONMENT'));

//if (CRAFT_ENVIRONMENT == "local"){
//	$_SERVER['PHP_SELF'] = 'tjm.test';
//	$_SERVER['SCRIPT_NAME'] = 'tjm.test';
//}


// Path to your craft/ folder
$craftPath = '../craft';

//// Define Paths
//define('CRAFT_CONFIG_PATH', '../config/');
//define('CRAFT_PLUGINS_PATH', '../plugins/');
//define('CRAFT_TEMPLATES_PATH', '../resources/templates/');
//define('CRAFT_STORAGE_PATH', '../storage/');
//define('CRAFT_TRANSLATIONS_PATH', '../resources/lang/');

// Do not edit below this line
$path = rtrim($craftPath, '/').'/app/index.php';

if (!is_file($path))
{
	if (function_exists('http_response_code'))
	{
		http_response_code(503);
	}

	exit('Could not find your craft/ folder. Please ensure that <strong><code>$craftPath</code></strong> is set correctly in '.__FILE__);
}

require_once $path;
