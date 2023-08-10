<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $Pagination = 20;
        $users = User::query();
        $users = $users->paginate($Pagination);
        return response()->json([
            'users' => $users
        ]);
    }
}
