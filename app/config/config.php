
<?php

/**
 * Define Environment
 */

 define( 'ENVIRONMENT' , 'development');


 if(ENVIRONMENT == 'development')
 	ini_set('display_error', 1);


/**
 * Generating URL for public folder 
 *
 */

 define( 'HTTP_SCHEME', 		'http://');
 define( 'HTTP_HOST', 			$_SERVER['HTTP_HOST']);
 define( "URL", HTTP_SCHEME . HTTP_HOST . DIRECTORY_SEPARATOR . 'mvc-gallery/public' . DIRECTORY_SEPARATOR);

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'photo_gallery');
define('DB_USER', 'root');
define('DB_PASS', 'local_password123');
define('DB_CHARSET', 'utf8');