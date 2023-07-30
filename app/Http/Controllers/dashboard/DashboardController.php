<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request){
        $is_admin=$request->user()->is_admin;
        return view('dashboard',compact('is_admin'));
    }
}
