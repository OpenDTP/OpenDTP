<?php

namespace App\Modules\Core\Controllers;

use App\Modules\Core\Models\Api;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Api::get('/api/v1/user', Session::get('session.token'));
        return View::make('core::site.company.list', ['company' => $user->company, 'partners' => $user->partners]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('core::site.company.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $company = Api::post('api/v1/company', Input::all(), null, Session::get('session.token'));
        return Redirect::to('/company/' . $company->id)
            ->with('success', 'Successfully created company ' . $company->name);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $company = Api::get('/api/v1/company/' . $id, Session::get('session.token'));
        return View::make('core::site.company.show', ['company' => $company]);
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
