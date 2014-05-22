<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use App\Modules\Core\Models\Api;

class ApiController extends Controller
{
    public function getShow($model, $elem_id)
    {
        $response = Api::get($model . '/' . $elem_id);
        return View::make('core::site.' . $model . '.show')->with('response', $response->body->data);
    }
    public function getModel($model, $elem_id)
    {
        return Api::get($model . '/' . $elem_id);
    }
}
