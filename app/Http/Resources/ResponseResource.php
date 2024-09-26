<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
{
    public static function success($data = null, $message = 'Operation successful')
    {
        return response()->json([
            'success'       => true,
            'message'       => $message,
            'data'          => $data,
            'errors'        => null
        ]);
    }

    public static function error($message = 'An error occurred', $errors = null, $statusCode = 400)
    {
        return response()->json([
            'success'       => false,
            'message'       => $message,
            'data'          => null,
            'errors'        => $errors
        ], $statusCode);
    }
}
