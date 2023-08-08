<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Enums\TokenAbility;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function create(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();

        if ($user->tokens() != null) {
            $user->tokens()->delete();
        }

        return $this->makeTokens($user);
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $user = new User();
        $password = Hash::make($request->password);
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->password = $password;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();

        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        $user = auth()->user();

        return $this->makeTokens($user);

    }

    public function destroy(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function refresh(): JsonResponse
    {
        $user = auth()->user();

        $user->tokens()->delete();

        return $this->makeTokens($user);

    }

    public function rest(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return response()->json([
            'message' => __($status)
        ]);
    }


    protected function makeTokens($user): JsonResponse
    {
        $accessToken = $user->createToken('access_token', [TokenAbility::ACCESS_API->value]
            , Carbon::now()->addMinutes(config('sanctum.token_expiration')));

        $refreshToken = $user->createToken('refresh_token', [TokenAbility::ISSUE_ACCESS_TOKEN->value]
            , Carbon::now()->addMinutes(config('sanctum.rt_expiration')));

        return response()->json([
            'Access Token' => $accessToken->plainTextToken,
            'Refresh Token' => $refreshToken->plainTextToken,
        ]);
    }
}
