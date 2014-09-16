<?php

namespace App\Modules\Project\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Modules\Core\Models\Api;

class TeamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($project_id)
    {
        $teams = Api::get('api/v1/project/$project_id/team', Session::get('session.token'));
        return View::make('project::site.project.list', ['team' => $teams]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $team_id
     * @return Response
     */
    public function show($project_id, $team_id)
    {
        $team = Api::get("api/v1/team/$team_id", Session::get('session.token'));
        return View::make('project::site.partials.teams', ['team' => $team]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
