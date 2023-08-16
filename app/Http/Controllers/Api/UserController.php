<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ValidateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $pagination = 20;
        $users=User::with("address")->paginate($pagination);
        return Response::customResponse("return users",UserResource::collection($users));
    }

    public function store(ValidateUserRequest $request)
    {
        $validator = $request->validated();

        $user = new User();
        $password = Hash::make($request->password);
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->password = $password;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin??0;
        $user->is_active = $request->is_active??1;
        $user->save();

        return Response::customResponse("return user stored",UserResource::make($user));

    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validated();

        $user->fill($validatedData);
        $user->save();

        return response()->json([
            'user' => UserResource::make($user)
        ]);

    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        if ($user)
            return response()->json([
                'massage' => "user delete successfully"
            ]);
        else
            return response()->json([
                'massage' => "user delete have error"
            ],400);
    }
}
