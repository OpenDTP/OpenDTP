<?php

namespace App\Modules\Core\Serviceproviders;

use Illuminate\Support\ServiceProvider;
use App\Modules\Core\Models\Api;

class ApiServiceProvider extends ServiceProvider
{

	public function register()
	{
			$this->app->bind('Api', function(){
				return new Api;
			});
	}

}
