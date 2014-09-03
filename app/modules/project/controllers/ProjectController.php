<?php

namespace App\Modules\Project\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Modules\Core\Models\Api;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Api::get('api/v1/project', Session::get('session.token'));
        return View::make('project::site.project.list', ['projects' => $projects]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Api::get('api/v1/user', Session::get('session.token'));
        $companies_names = [];
        $companies = $user->partners;

        if (isset($user->company)) {
            $companies[] = $user->company;
        }

        foreach ($companies as $company) {
            $companies_names[$company->id] = $company->name;
        }

        return View::make('project::site.project.create', ['companies_name' => $companies_names]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $project = Api::post('api/v1/project', Input::all(), null, Session::get('session.token'));
        return Redirect::to('/project/' . $project->id)
            ->with('success', 'Successfully created project ' . $project->name);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $users = array();
        $project = Api::get("api/v1/project/$id", Session::get('session.token'));
        $tickets = Api::get("api/v1/project/$id/ticket", Session::get('session.token'));
        $teams = Api::get("api/v1/project/$id/team", Session::get('session.token'));
        foreach ($teams as $team) {
            $user = Api::get("api/v1/user/$team->user_id", Session::get('session.token'));
            array_push($users, $user);
        }
        return View::make('project::site.project.show', ['project' => $project,
                                                         'tickets' => $tickets,
                                                         'teams' => $teams,
                                                         'users' => $users]);
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
