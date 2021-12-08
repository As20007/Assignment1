<?php

// localhost
if ( ($_SERVER['HTTP_HOST'] == 'localhost') || ($_SERVER['HTTP_HOST'] == '127.0.0.1') ) {
	define("ROOT_PATH", '/Users/astahl/Documents/GitHub/ANLY575/final/');
	define("PROTOCOL", 'http://');
	define("DOMAIN", 'localhost/');
	define('DB', array(
		'host' => 'localhost',
		'db'   => 'anly575',
		'user' => 'Amalia',
		'pass' => 'Amalia00!',
		'charset' => 'utf8mb4'
	));
	define("SUBFOLDER", 'final/');
	
} else {
	// public server
	define("ROOT_PATH", '/home/amaliasg/public_html/ANLY575/final/');
	define("PROTOCOL", 'https://');
	define("DOMAIN", 'amalias.georgetown.domains/');
	define('DB', array(
		'host' => 'paulbohman.georgetown.domains',
		'db'   => 'amaliasg_sequel',
		'user' => 'amaliasg_1',
		'pass' => 'Amalia00!',
		'charset' => 'utf8mb4'
	));
	define("SUBFOLDER", 'ANLY575/final/');
}

define("ADMIN_EMAIL", 'aas307@georgetown.edu.edu');
define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
define ('TABLES', array(
    'User' => 'users',
	'Icuadmission' => 'icuadmissions',
));