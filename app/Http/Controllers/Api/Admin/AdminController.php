<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\OperationService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return ResponseResource::success(UserResource::collection($users), 'Successful display of information');
    }

    public function store(AdminUserRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->all());

        return ResponseResource::success(new UserResource($user), 'The operation was successful');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return ResponseResource::success(new UserResource($user), 'Successful display of information');
    }

    public function update(AdminUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['mobile', 'name', 'email', 'user_type']));
        return ResponseResource::success(new UserResource($user), 'The operation was successful');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ResponseResource::success('Data deleted successfully');
    }
}
