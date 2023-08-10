<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\HasApiTokens;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasFactory, HasApiTokens;

    // Override the createToken method/ to customize token creation
    public static function createToken($name, array $abilities = ['*'], $expiresAt = null)
    {
        $token = hash('sha256', $name . uniqid(mt_rand(), true));

        $user = auth()->user();

        $tokenInstance = parent::create([
            'name' => $name,
            'token' => $token,
            'abilities' => $abilities,
            'expires_at' => $expiresAt,
        ]);

        $user->tokens()->save($tokenInstance);

        return $tokenInstance;
    }
    public function format($value)
    {
        return 'TOKEN-' . $value;
    }

    public static function boot(): void
    {
        parent::boot();


        Sanctum::usePersonalAccessTokenModel(self::class);

    }
}
