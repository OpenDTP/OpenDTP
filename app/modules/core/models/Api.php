<?php

namespace App\Modules\Core\Models;

use Httpful\Request;
use Illuminate\Support\Facades\Config;

class Api extends \Eloquent
{
    /**
     * Get model
     * @param  Query $query $token
     * @return Query
     */
    public static function get($query, $token = "")
    {
        $api_url = Config::get('opendtp/api.url');

        try {
            $response = Request::get($api_url . $query)
                ->addHeader('Authorization', $token)
                ->send();
        } catch (Exception $e) {
            throw new Exception('Error on the API GET of [' . $query . ']: ', 0, $e);
        }
        if (isset($response->body->status) && 400 < $response->body->status) {
            throw new \Exception($response->body->error, $response->body->status);
        }
        if (!isset($response->body->code) || (isset($response->body->code) && $response->body->code !== 200)) {
            $message = isset($response->body->message) ? $response->message->body : print_r($response, true);
            $code = isset($response->body->code) ? $response->message->code : 500;
            throw new \Exception(
                'Internal API error on GET of [' . $query . ']: ' . print_r($message, true),
                $code
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
        $api_url = Config::get('opendtp/api.url');

        try {
            $response = Request::put($api_url . $query)
                ->addHeader('Authorization', $token)
                ->body(json_encode($body))
                ->send();
        } catch (Exception $e) {
            throw new Exception('Error on the API PUT of [' . $query . ']: ', 0, $e);
        }
        if (isset($response->body) && 401 === $response->body->status) {
            throw new \Exception($response->body->error, $response->body->status);
        }
        if (!isset($response->body->code) || (isset($response->body->code) && $response->body->code !== 200)) {
            $message = isset($response->body->message) ? $response->message->body : print_r($response, true);
            $code = isset($response->body->code) ? $response->message->code : 500;
            throw new \Exception(
                'Internal API error on PUT of [' . $query . ']: ' . print_r($message, true),
                $code
            );
        }
        return ($response->body->data);
    }

    /**
     * Post model
     * @param  Query $query $body $token
     * @return Query
     */
    public static function post($query, $body, $mime = "", $token = "", $files = array())
    {
        $api_url = Config::get('opendtp/api.url');

        try {
            $request = Request::post($api_url . $query, http_build_query($body), $mime)
                ->addHeader('Authorization', $token)
                ->body($body);
            if (isset($files)) {
                $request->attach($files);
            }
            $response = $request->send();
            if (isset($files)) {
                $response->body = json_decode($response);
            }
        } catch (Exception $e) {
            throw new Exception('Error on the API POST of [' . $query . ']: ', 0, $e);
        }
        if (isset($response->body->status) && 401 === $response->body->status) {
            throw new \Exception($response->body->error, $response->body->status);
        }
        if (!isset($response->body->code) || (isset($response->body->code) && $response->body->code !== 200)) {
            $message = isset($response->body->message) ? $response->message->body : print_r($response, true);
            $code = isset($response->body->code) ? $response->message->code : 500;
            throw new \Exception(
                'Internal API error on POST of [' . $query . ']: ' . print_r($message, true),
                $code
            );
        }
        return ($response->body->data);
    }

    /**
     * Oauth model
     * @param  Query $query $body $token
     * @return Query
     */
    public static function oauth($body)
    {
        $url = Config::get('opendtp/api.url') . '/oauth/access_token';

        try {
            $response = Request::post($url, http_build_query($body), 'application/x-www-form-urlencoded')
                ->send();
            $response = json_decode($response);
        } catch (Exception $e) {
            throw new Exception('Error on the API POST of [' . $query . ']: ', 0, $e);
        }
        if (isset($response->body) && 401 === $response->body->status) {
            throw new \Exception($response->body->error, $response->body->status);
        }
        if (!isset($response->access_token)) {
            $message = isset($response->body->message) ? $response->message->body : print_r($response, true);
            $code = isset($response->body->code) ? $response->message->code : 500;
            throw new \Exception(
                'Internal API error on authentification of [' . $query . ']: ' . print_r($message, true),
                $code
            );
        }
        return ($response);
    }

    public static function file($query, $token = "")
    {
        $api_url = Config::get('opendtp/api.url');

        try {
            $response = Request::get($api_url . $query)
                ->addHeader('Authorization', $token)
                ->send();
        } catch (Exception $e) {
            throw new Exception('Error on the API GET of [' . $query . ']: ', 0, $e);
        }
        if (isset($response->body->status) && 400 < $response->body->status) {
            throw new \Exception($response->body->error, $response->body->status);
        }

        return ($response);
    }
}
