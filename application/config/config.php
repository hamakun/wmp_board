<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'  => 'Mysql',
		'host'     => '127.0.0.1',
		'username' => 'makun',
		'password' => '1111',
		'name'     => 'makun',
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../application/controllers/',
		'modelsDir'      => __DIR__ . '/../../application/models/',
		'viewsDir'       => __DIR__ . '/../../application/views/',
		'pluginsDir'     => __DIR__ . '/../../application/plugins/',
		'libraryDir'     => __DIR__ . '/../../application/library/',
		'baseUri'        => '/',

	)
));