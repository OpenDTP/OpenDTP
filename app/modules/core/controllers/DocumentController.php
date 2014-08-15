<?php

namespace App\Modules\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Modules\Core\Models\Api;
use Illuminate\Support\Facades\Session;


class DocumentController extends Controller
{
    public function postUpload()
    {
        $file = Input::file('file');
        $destinationPath = 'uploads';
        $filename = $file->getClientOriginalName();
        $extension =$file->getClientOriginalExtension();
        $upload_success = Api::post('api/v1/document',
                  [
                    'file' => $file,
                    'company_id' => "1",
                    'name' => $filename,
                    'description' => "Wow"
                  ],
                  'multipart/form-data', Session::get('session.token'));

        if($upload_success) {
             return Response::json('success', 200);
        } else {
             return Response::json('error', 400);
        }
    }
}
