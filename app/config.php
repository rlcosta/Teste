<?php
	//Constantes
	$configs = new HXPHP\System\Configs\Config;

	$configs->env->add('development');

	$configs->env->development->baseURI = '/teste/';

	$configs->env->development->database->setConnectionData([
			'driver' => 'mysql',
			'host' => 'localhost',
			'user' => 'root',
			'password' => '',
			'dbname' => 'sistemahx',
			'charset' => 'utf8'
		]);

	$configs->env->development->auth->setURLs('/teste/home/','/teste/login/');

	

	return $configs;
