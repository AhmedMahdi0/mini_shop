<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Pagination=20;
        $users=User::paginate($Pagination);
        return view('index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateUserRequest $request)
    {
        $validator = $request->validated();

        $user=new User();
        $password= Hash::make($request->password);
        $user->username=$request->username;
        $user->first_name=$request->first_name;
        $user->password=$password;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->is_admin=$request->is_admin;
        $user->is_active=$request->is_active;
        $user->save();
        return redirect('/user');
      
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::where('id',$id)->first();
        return view('edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateUserRequest $request, string $id)
    {
        
        $validator = $request->validated();
        
        $user=User::where('id',$id)->first();
        $user->username=$request->username;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::where('id',$id)->delete();
        return redirect('/user');
    }
}
