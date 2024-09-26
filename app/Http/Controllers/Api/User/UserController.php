<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ResponseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $user->update($request->only(['mobile', 'name']));
        return ResponseResource::success($user, 'The operation was successful');
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return ResponseResource::success('Successfully logged out');
    }
}
