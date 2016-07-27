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


	$configs->env->add('production');

	$configs->env->production->baseURI = '/';

	$configs->env->production->database->setConnectionData([
			'driver' => 'mysql',
			'host' => 'localhost',
			'user' => '	u942981625_arant',
			'password' => 'tgPJ6jxDW40lMP',
			'dbname' => 'u942981625_banco',
			'charset' => 'utf8'
		]);

	$configs->env->production->auth->setURLs('/home/','/login/');

	return $configs;
