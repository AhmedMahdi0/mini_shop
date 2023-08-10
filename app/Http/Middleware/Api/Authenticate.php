<?php

namespace App\Http\Middleware\Api;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        return response()->json([
            'message' => 'Not authenticated'
        ], 401);
    }
}
