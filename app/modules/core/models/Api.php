<?php namespace App\Modules\Content\Models;

class Entry extends \Eloquent
{
	protected $api_url = "http://192.168.57.101/api/v1/";
	/**
	 * Find page
	 * @param  Query  $query
	 * @return Query
	 */
	public static function get($query, $token = "")
	{
		try
		{
			return Httpful::get($this->api_url . $query)->authenticateWith('admin', 'admin')->send();
		}
		catch (Exception $e)
		{
			throw new Exception( 'Error on the API GET of ['.$query.']: ', 0, $e);
		}
	}
}
