<?php
//
//namespace App\Http\Controllers\dashboard;
//
//use App\Http\Controllers\Controller;
//use App\Http\Requests\UpdateUserRequest;
//use App\Http\Requests\ValidateUserRequest;
//use App\Models\User;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//
//
//class UserController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     */
//    public function index(Request $request)
//    {
//        $Pagination = 20;
//
//        $users = User::query();
//        $users = $users->filter($request);
//        $queryParams = $request->except('page');
//        $users = $users->paginate($Pagination);
//        return view('user.list-users', compact(['users','queryParams']));
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        return view('user.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(ValidateUserRequest $request)
//    {
//        $validator = $request->validated();
//
//        $user = new User();
//        $password = Hash::make($request->password);
//        $user->username = $request->username;
//        $user->first_name = $request->first_name;
//        $user->password = $password;
//        $user->last_name = $request->last_name;
//        $user->email = $request->email;
//        $user->is_admin = $request->is_admin;
//        $user->is_active = $request->is_active;
//        $user->save();
//        return redirect('/users');
//
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show()
//    {
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(string $id)
//    {
//        $user = User::where('id', $id)->first();
//        if ($user==null){
//            return redirect()->back();
//        }
//        return view('user.edit', compact('user'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(UpdateUserRequest $request, string $id)
//    {
//        $request->id = $id;
//        $validator = $request->validated();
//
//        $user = User::where('id', $id)->first();
//        $user->username = $request->username;
//        $user->first_name = $request->first_name;
//        $user->last_name = $request->last_name;
//        $user->email = $request->email;
//        $user->is_admin = $request->is_admin;
//        $user->is_active = $request->is_active;
//
//        $user->save();
//        return redirect('/users');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(string $id)
//    {
//        $user = User::where('id', $id)->delete();
//        return redirect('/users');
//    }
//}
