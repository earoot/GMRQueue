<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class UsersController extends Controller
{

    public function authRequired(Request $request)
    {
      $response["success"] = false;
      $response["message"] = "Authentication required";

      return Response::json($response, 401);
    }

}
