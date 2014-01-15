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
		'controllersDir' => __DIR__ . '/../../application/controllers/',
		'modelsDir'      => __DIR__ . '/../../application/models/',
		'viewsDir'       => __DIR__ . '/../../application/views/',
		'pluginsDir'     => __DIR__ . '/../../application/plugins/',
		'libraryDir'     => __DIR__ . '/../../application/library/',
		'baseUri'        => '/wmp_board/',
	)
));