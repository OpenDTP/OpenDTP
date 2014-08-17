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
        $user = $this->user->find($id);

        if ($user) {
            return View::make('core::site.user.show', compact('user'));
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
        $user = $this->user->find($id);

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
        $user = $this->user->create(Input::all());

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
        $user = $this->user->update(Input::all());

        if ($user) {
            return Redirect::route('core::site.user.show', $user->id)->with('message', 'The user has been created!');
        }

        return Redirect::route('core::site.user.create', $user->id)->withInput()->withErrors($this->user->errors());
    }
}
