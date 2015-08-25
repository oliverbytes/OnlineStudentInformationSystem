<?php

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/ 

defined('DS') ? null : 				define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 		define('SITE_ROOT'		, DS.'xampp'.DS.'htdocs'.DS.'stisis');
defined('DB_SERVER') ? null : 		define("DB_SERVER"		, "localhost");
defined('DB_NAME') ? null : 		define("DB_NAME"		, "wwwkelly_stisis");
defined('DB_USER') ? null : 		define("DB_USER"		, "root");
defined('DB_PASS') ? null : 		define("DB_PASS"		, "");
defined('HOSTNAME') ? null : 		define("HOSTNAME"		, "http://localhost/");
defined('HOST') ? null : 			define("HOST"			, HOSTNAME . "stisis/");

// defined('SITE_ROOT') ? null : 		define('SITE_ROOT'		, DS.'home'.DS.'wwwkelly'.DS.'public_html'.DS.'stisis');
// defined('DB_SERVER') ? null : 		define("DB_SERVER"		, "localhost");
// defined('DB_NAME') ? null : 			define("DB_NAME"		, "wwwkelly_stisis");
// defined('DB_USER') ? null : 			define("DB_USER"		, "wwwkelly_user");
// defined('DB_PASS') ? null : 			define("DB_PASS"		, "DhjkLmnOP2{}");
// defined('HOSTNAME') ? null : 		define("HOSTNAME"		, "http://kellyescape.com/stisis/");
// defined('HOST') ? null : 			define("HOST"			, "http://kellyescape.com/stisis/");

defined('INCLUDES_PATH') ? null : 	define('INCLUDES_PATH', SITE_ROOT.DS.'includes');
defined('PUBLIC_PATH') ? null : 	define('PUBLIC_PATH', SITE_ROOT.DS.'public');
defined('CLASSES_PATH') ? null : 	define('CLASSES_PATH', INCLUDES_PATH.DS.'classes');

// HELPERS
require_once(INCLUDES_PATH.DS."config.php");

// CORE PHPS
require_once(CLASSES_PATH.DS."database.php");
require_once(CLASSES_PATH.DS."database_object.php");
require_once(CLASSES_PATH.DS."session.php");

// OBJECT PHPS
require_once(CLASSES_PATH.DS."appointment_detail.php");
require_once(CLASSES_PATH.DS."enrollment_detail.php");
require_once(CLASSES_PATH.DS."inquiry.php");
require_once(CLASSES_PATH.DS."personal_information.php");
require_once(CLASSES_PATH.DS."school_considered.php");
require_once(CLASSES_PATH.DS."school_last_attended.php");
require_once(CLASSES_PATH.DS."sti_discovery.php");
require_once(CLASSES_PATH.DS."student.php");
require_once(CLASSES_PATH.DS."user.php");
require_once(CLASSES_PATH.DS."response.php");

?>