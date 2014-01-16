<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'  => 'Mysql',
		'host'     => 'localhost',
		'username' => 'root',
		'password' => '',
		'name'     => 'wmp_board',
	),
	'application' => array(
		'controllersDir' => '../application/controllers/',
		'modelsDir'      => '../application/models/',
		'viewsDir'       => '../application/views/',
		'pluginsDir'     => '../application/plugins/',
		'libraryDir'     => '../application/library/',
		'baseUri'        => '/wmp_board/',
	)
));