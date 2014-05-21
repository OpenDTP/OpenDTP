<?php

namespace App\Modules\Core\Models;
use Httpful\Httpful;

class Api extends \Eloquent
{
	protected static $api_url = "http://192.168.57.101/api/v1/";
	/**
	 * Find page
	 * @param  Query  $query
	 * @return Query
	 */
	public static function get($query, $token = "")
	{
		try
		{
			return \Httpful\Request::get(self::$api_url . $query)->authenticateWith('admin', 'admin')->send();
		}
		catch (Exception $e)
		{
			throw new Exception( 'Error on the API GET of ['.$query.']: ', 0, $e);
		}
	}
}
