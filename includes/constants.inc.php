<?php
// Timezone
date_default_timezone_set("Asia/Manila"); 
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

// Directory Settings
define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT'] .'/chikka');
define("CLASS_DIR", DOC_ROOT .'/class');
define("LOG_DIR", DOC_ROOT .'/logs');
define("APPS_DIR", DOC_ROOT .'/apps');

// Chikka Settings
define("CHIKKA_URL","https://post.chikka.com/smsapi/request");
define("CHIKKA_CLIENT_ID", "" );
define("CHIKKA_CLIENT_SECRET","");
define("CHIKKA_ACCESSCODE","");

// Database Configuration staging
define(DB_USERNAME,	'');
define(DB_PASSWORD,	'');
define(DB_HOSTNAME,	'');
define(DB_NAME,		'');
?>