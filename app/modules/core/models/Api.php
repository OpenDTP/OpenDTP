<?php

namespace App\Modules\Core\Models;

use Httpful\Httpful;

class Api extends \Eloquent
{
    protected static $api_url = "http://192.168.57.101/api/v1/";

    /**
    * Get model
    * @param  Query  $query $token
    * @return Query
    */
    public static function get($query, $token = "")
    {
        try {
             return \Httpful\Request::get(self::$api_url . $query)
             ->authenticateWith('admin', 'admin')
             ->send()->body->data;
        } catch (Exception $e) {
             throw new Exception('Error on the API GET of ['.$query.']: ', 0, $e);
        }
    }

    /**
    * Put model
    * @param  Query  $query $body $token
    * @return Query
    */
    public static function put($query, $body, $token = "")
    {
        try {
             return \Httpful\Request::put(self::$api_url . '1')
             ->authenticateWith('admin', 'admin')
             ->body(json_encode($body))
             ->send();
        } catch (Exception $e) {
             throw new Exception('Error on the API PUT of ['.'1'.']: ', 0, $e);
        }
    }

    /**
    * Post model
    * @param  Query  $query $body $token
    * @return Query
    */
    public static function post($query, $body, $token = "")
    {
        try {
             return \Httpful\Request::post(self::$api_url . $query)
             ->authenticateWith('admin', 'admin')
             ->body(json_encode($body))
             ->send();
        } catch (Exception $e) {
             throw new Exception('Error on the API POST of ['.$query.']: ', 0, $e);
        }
    }
    /**
    * Oauth model
    * @param  Query  $query $body $token
    * @return Query
    */
    public static function oauth($query, $body, $token = "")
    {
        try {
             return \Httpful\Request::post($query, http_build_query($body), 'application/x-www-form-urlencoded')
             ->authenticateWith('admin', 'admin')
             ->send();
        } catch (Exception $e) {
             throw new Exception('Error on the API POST of ['.$query.']: ', 0, $e);
        }
    }
}
