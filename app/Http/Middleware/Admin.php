<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        $is_admin = empty($request->user()->is_admin) ? false : $request->user()->is_admin;

            if ($is_admin==1) {
                return $next($request);
            }
        return redirect('/dashboard');
    }

}
