<?php
define("ROOT_PATH", '/astahl/desktop/data-site/init/data-site/');
define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("PROTOCOL", 'http://');
define("DOMAIN", 'amalias.georgetown.domains/ANLY575');
define("SUBFOLDER", 'data-site/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
const TABLES = array(
	'User' => 'users',
	'Assignment' => 'assignments',
	'Submission' => 'submissions'
);
const DB = array(
	'host' => '198.211.108.9',
	'db'   => 'amaliasg_sequel',
	'user' => 'amaliasg_1',
	'pass' => 'London2000!',
	'charset' => 'utf8mb4'
);