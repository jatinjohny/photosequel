<?php


/**
 *
 * Define Path to Web Root Directory and App directory
 */

if( !defined("WEB_ROOT"))
	define ( 'WEB_ROOT' , dirname(__DIR__) . DIRECTORY_SEPARATOR);

if( !defined("APP_DIR"))
	define ( 'APP_DIR'  , WEB_ROOT . 'app'. DIRECTORY_SEPARATOR);


// For debugging purposes, uncomment the following statements
// echo WEB_ROOT, '<br>';
// echo APP_DIR, '<br>';

// Load the config file
require_once APP_DIR . 'config/config.php';
// For debugging purposes, uncomment the following statements
//echo URL;

require_once APP_DIR . 'core/session.php';
require_once APP_DIR . 'core/application.php';
require_once APP_DIR . 'core/controller.php';

$session = SESSION::getInstance();
$app = new Application;
