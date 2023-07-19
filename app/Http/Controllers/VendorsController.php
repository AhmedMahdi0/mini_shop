<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorsRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorsController extends Controller
{

    public function index(Request $request)
    {
        $Pagination = 20;

        $vendors = Vendor::query();
        $vendors = $vendors->filter($request);
        $vendors = $vendors->paginate($Pagination);
        return view('vendor.list-vendors',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorsRequest $request)
    {
        $validator = $request->validated();

        $vendor = new Vendor();
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->is_active = $request->is_active;
        $vendor->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendor = Vendor::where('id', $id)->first();
        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorsRequest $request, string $id)
    {

        $request->id = $id;
        $validator = $request->validated();

        $vendor = Vendor::where('id', $id)->first();
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->is_active = $request->is_active;

        $vendor->save();
        return redirect('/vendors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vendor::where('id', $id)->delete();
        return redirect('/vendors');
    }
}
