<?php

namespace App\Modules\Project\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Modules\Core\Models\Api;

class ExploreController extends controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $documents = Api::get("api/v1/document", Session::get('session.token'));
        return View::make('project::site.explore.show', [ 'documents' => $documents ]);
    }
}
