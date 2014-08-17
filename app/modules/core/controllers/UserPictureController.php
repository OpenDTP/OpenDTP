<?php

namespace App\Modules\Core\Controllers;

use App\Modules\Core\Models\Api;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class UserPictureController extends Controller
{
    public function index()
    {
        $picture = Api::file('api/v1/user/picture', Session::get('session.token'));

        if (isset($picture->body->code) && 404 === $picture->body->code) {
            $picture = file_get_contents(
                public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'shared' . DIRECTORY_SEPARATOR .
                'logobnw.png'
            );
        }

        return Response::make($picture, 200)
            ->header('Content-Type', 'image/jpeg');
    }

    public function show($id)
    {
        $picture = Api::file('api/v1/user/' . $id . '/picture', Session::get('session.token'));

        if (isset($picture->body->code) && 404 === $picture->body->code) {
            $picture = file_get_contents(
                public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'shared' . DIRECTORY_SEPARATOR .
                'logobnw.png'
            );
        }

        return Response::make($picture, 200)
            ->header('Content-Type', 'image/jpeg');
    }
} 