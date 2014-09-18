<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Modules\Core\Models\Api;

class UserController extends Controller
{

    public function index()
    {
        $user = Api::get('api/v1/user', Session::get('session.token'));

        return View::make('core::site.user.show', compact('user'));
    }

    /**
     * Show
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $user = Api::get('api/v1/user/' . $id, Session::get('session.token'));

        if ($user) {
          return View::make('project::site.partials.team', compact('user'));
        }
        App::abort(404);
    }

  /**
   * Get edit
   *
   * @param $id
   * @return Response
   */
    public function getEdit($id)
    {
        $user = Api::get('api/v1/user/' . $id, Session::get('session.token'));

        if ($user) {
            return View::make('core::site.user.edit', compact('user'));
        }
        App::abort(404);
    }

  /**
   * Store
   *
   * @return Response
   */
    public function store()
    {
        $user = Api::post('api/v1/user', Input::all(), null, Session::get('session.token'));

        if ($user) {
            return Redirect::route('core::site.user.show', $user->id)->with('message', 'The user has been created!');
        }

        return Redirect::route('core::site.user.create', $user->id)->withInput()->withErrors($this->user->errors());
    }
  /**
   * Update
   *
   * @return Response
   */
    public function update()
    {
        $user = Api::put('api/v1/user', Input::all(), Session::get('session.token'));

        if ($user) {
            return Redirect::route('core::site.user.show', $user->id)->with('message', 'The user has been created!');
        }

        return Redirect::route('core::site.user.create', $user->id)->withInput()->withErrors($this->user->errors());
    }
}
