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
define("CHIKKA_CLIENT_ID","97a60f4a3243fb17ed8e4af10d57076f34dc5fa8f072e07384945985c508700d" );
define("CHIKKA_CLIENT_SECRET","7bbe0fa2ab4705101445c2945e2cfeb234afe82c34662f180d7d7ee735c7c7c5");
define("CHIKKA_ACCESSCODE","292900114");

// Database Configuration staging

define(DB_USERNAME,	'chikka_menu_user');
define(DB_PASSWORD,	'Louijiconway14');
define(DB_HOSTNAME,	'localhost');
define(DB_NAME,		'db_chikka_menu');



?>