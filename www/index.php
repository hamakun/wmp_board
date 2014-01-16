<?php

error_reporting(E_ALL);

$debug = new \Phalcon\Debug();
$debug->listen();

$config = include "../application/config/config.php";

try
{
	$di = new \Phalcon\DI\FactoryDefault();

	// Loader - 참고자료
	// http://docs.phalconphp.com/en/latest/reference/loader.html
	// http://docs.phalconphp.com/en/latest/reference/tutorial.html#autoloaders
	// http://docs.phalconphp.com/en/latest/reference/tutorial-invo.html#autoloaders
	$loader = new \Phalcon\Loader();
	$loader->registerDirs(array(
	    $config->application->controllersDir
	))->register();

	/*
	$di->set('url', function() use ($config) {
		$url = new \Phalcon\Mvc\Url();
		$url->setBaseUri('$config->application->baseUri');
		return $url;
	}, true);
	*/

	$di->set('volt', function($view, $di) {
		$volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
		$volt->setOptions(array(
			"compiledPath" => '../cache/volt/',
			"compiledSeparator" => "_"
		));
		return $volt;
	}, true);

	$di->set('view', function() use ($config) {
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir($config->application->viewsDir);
		$view->registerEngines(array(
			".volt" => 'volt'
		));
		return $view;
	}, true);

	// $di->set('config', $config);

	$application = new Phalcon\Mvc\Application($di);
	echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}