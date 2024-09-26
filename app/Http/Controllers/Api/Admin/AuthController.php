<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\OperationService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected $operationService;

    public function __construct(OperationService $operationService)
    {
        $this->operationService = $operationService;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::firstWhere('email', $credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return ResponseResource::error('Your login credentials are invalid', 'Unauthorized', 401);
        }

        $token = $user->createToken('login', [$user->user_type], now()->addDay(1))->accessToken;
        $dataUser = [
            'user'         => new UserResource($user),
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ];
        return ResponseResource::success($dataUser, 'The operation was successful');
    }
    public function loginPasswordType(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::firstWhere('email', $credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return ResponseResource::error('Your login credentials are invalid', 'Unauthorized', 401);
        }
        // http://127.0.0.1:8000/oauth/token
        $response = Http::asForm()->post(config('services.passport.login_endpoint'), [
            'grant_type'    => 'password',
            'client_id'     => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'username'      => $user->email,
            'password'      => $credentials['password'],
            'scope'         => $user->user_type,
        ]);
        if ($response->successful()) {
            $token = $user->createToken('login', [$user->user_type], now()->addDay(1))->accessToken;
            $dataUser = [
                'user'         => new UserResource($user),
                'access_token' => $token,
                'token_type'   => 'Bearer',
            ];
            return ResponseResource::success($dataUser, 'The operation was successful');
        } else {
            return ResponseResource::error('Unauthorized', $response->json(), 401);
        }
    }

    protected function respondWithToken($token)
    {
        $dataToken = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
        return ResponseResource::success($dataToken, 'The operation was successful');
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return ResponseResource::success('Successfully logged out');
    }
}
