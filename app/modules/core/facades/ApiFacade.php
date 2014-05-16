<?php namespace App\Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;

class ApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return new \App\Modules\Core\Models\Api; }

}
