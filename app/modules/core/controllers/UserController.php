<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Opendtp\Entity\User\UserEntity;
use Opendtp\Storage\User\UserRepository as User;

class UserController extends Controller
{
    public function __construct(UserEntity $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return $this->user->all();
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
            return Redirect::route('core::site.user.show', $id)->with('message', 'The user has been created!');
        }

        return Redirect::route('core::site.user.create', $id)->withInput()->withErrors($this->user->errors());
    }
}
