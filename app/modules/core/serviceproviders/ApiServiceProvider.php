<?php

class ApiServiceProvider extends ServiceProvider
{

	public function register()
	{
			$this->app->bind('Api', function(){
				return new Api\Api;
			});
	}

}
