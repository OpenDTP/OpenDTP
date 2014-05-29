<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use App\Modules\Core\Models\User;
use App\Modules\Core\Facades\UserFacade;

class UserController extends Controller
{
    public function show($id)
    {
        $user = UserFacade::make($id);

        return View::make('core::site.user.show')->with('user', $user);
    }
}
