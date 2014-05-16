<?php namespace App\Modules\Core;

class ApiServiceProvider extends \Illuminate\Support\ServiceProvider
{

	public function register()
	{
		\Log::debug("ApiServiceProvider registered");
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Api', 'App\Modules\Core\Facades\ApiFacade');
		});
	}

}
