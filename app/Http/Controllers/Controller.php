<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function ResponseSuccess($data,$code)
    {
        return response()->json([
            "code"      => $code,
            "message"   => "success",
            "data"      => $data
        ]);
    }

    public function ResponseError($data,$message,$code)
    {
        return response()->json([
            "code"      => $code,
            "message"   => $message,
            "data"      => $data,
        ]);
    }
}
