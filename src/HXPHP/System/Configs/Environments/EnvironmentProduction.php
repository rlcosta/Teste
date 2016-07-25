<?php

namespace HXPHP\System\Configs\Environments;

use HXPHP\System\Configs as Configs;

class EnvironmentProduction extends Configs\AbstractEnvironment
{
	public function __construct()
	{
		ini_set('display_errors', 0);
	}
}