<?php

namespace App\Modules\Core\Models;

use Httpful\Request;

class Api extends \Eloquent
{
    protected static $api_url = "http://192.168.57.101/";

    /**
     * Get model
     * @param  Query $query $token
     * @return Query
     */
    public static function get($query, $token = "")
    {
        try {
            $response = Request::get(self::$api_url . $query)
                ->addHeader('Authorization', $token)
                ->send();
        } catch (Exception $e) {
            throw new Exception('Error on the API GET of [' . $query . ']: ', 0, $e);
        }
        if (!isset($response->body->data)) {
            throw new \Exception(
                'Internal API error on GET of [' . $query . ']: ' . print_r($response, true),
                500
            );
        }
        return ($response->body->data);
    }

    /**
     * Put model
     * @param  Query $query $body $token
     * @return Query
     */
    public static function put($query, $body, $token = "")
    {
        try {
            $response = Request::put(self::$api_url . $query)
                ->addHeader('Authorization', $token)
                ->body(json_encode($body))
                ->send();
        } catch (Exception $e) {
            throw new Exception('Error on the API PUT of [' . $query . ']: ', 0, $e);
        }
        if (!isset($response->body->data)) {
            throw new \Exception(
                'Internal API error on PUT of [' . $query . ']: ' . print_r($response, true),
                500
            );
        }
        return ($response->body->data);
    }

    /**
     * Post model
     * @param  Query $query $body $token
     * @return Query
     */
    public static function post($query, $body, $mime = "", $token = "")
    {
        try {
            $response = Request::post(self::$api_url . $query, http_build_query($body), $mime)
                ->addHeader('Authorization', $token)
                ->body(json_encode($body))
                ->send();
        } catch (Exception $e) {
            throw new Exception('Error on the API POST of [' . $query . ']: ', 0, $e);
        }
        if (!isset($response->body->data)) {
            throw new \Exception(
                'Internal API error on POST of [' . $query . ']: ' . print_r($response, true),
                500
            );
        }
        return ($response->body->data);
    }

    /**
     * Oauth model
     * @param  Query $query $body $token
     * @return Query
     */
    public static function oauth($query, $body, $token = "")
    {
        try {
            $response = Request::post($query, http_build_query($body), 'application/x-www-form-urlencoded')
                ->send();
            $response = json_decode($response);
        } catch (Exception $e) {
            throw new Exception('Error on the API POST of [' . $query . ']: ', 0, $e);
        }
        if (!isset($response->access_token)) {
            throw new \Exception(
                'Internal API error on authentification of [' . $query . ']: ' . print_r($response, true),
                500
            );
        }
        return ($response);
    }
}
