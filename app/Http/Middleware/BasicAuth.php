<?php

namespace App\Http\Middleware;

use App\Http\Resources\ResponseResource;
use Closure;
use Illuminate\Http\Request;

class BasicAuth
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = env('API_KEY');
        $authorizationHeader = $request->header('Authorization');

        if (!$authorizationHeader || !str_starts_with($authorizationHeader, 'Basic ')) {
            return ResponseResource::error('Unauthorized',401);
        }

        $token = base64_decode(substr($authorizationHeader,6));

        if (ltrim($token,':') !== $apiKey) {
            return ResponseResource::error('Unauthorized',401);
        }

        return $next($request);
    }
}

