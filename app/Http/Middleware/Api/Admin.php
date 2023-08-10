<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $is_admin = empty($request->user()->is_admin) ? false : $request->user()->is_admin;

        if ($is_admin==1) {
            return $next($request);
        }
        return response()->json([
            'message' => 'User Not Admin'
        ]);
    }
}
