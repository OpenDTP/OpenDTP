<?php

namespace App\Modules\Project\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class ExploreController extends controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('project::site.explore.show');
    }
}
