<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//Development
// defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'wamp64'.DS.'www'.DS.'mazzo_php_app_dev');

//Production AWS
//defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'var'.DS.'www'.DS.'html');

//Production Heroku
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'app');

defined('LIB_PATH')? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

//load config file first
//require_once(LIB_PATH.DS.'config.php'); 

//Load basic functions next so everything after can use them. 
require_once(LIB_PATH.DS.'functions.php'); 
require_once(LIB_PATH.DS.'validation_functions.php'); 
//load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php'); 
require_once(LIB_PATH.DS.'database_object.php'); 
require_once(LIB_PATH.DS.'db_credentials.php'); 
require_once(LIB_PATH.DS.'pagination.php'); 

//load database related classes
require_once(LIB_PATH.DS.'user.php'); 
require_once(LIB_PATH.DS.'photograph.php'); 
require_once(LIB_PATH.DS.'comment.php'); 



?>