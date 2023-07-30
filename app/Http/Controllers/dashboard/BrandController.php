<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    public function index(Request $request)
    {
        $Pagination = 20;

        $brands = Brand::query();
        $brands = $brands->filter($request);
        $brands = $brands->paginate($Pagination);
        $queryParams = $request->except('page');
        return view('brand.list-brand',compact(['brands','queryParams']));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(BrandRequest $request)
    {
        $validator = $request->validated();
        $brand=new Brand();
        $brand->name = $request->name;
        $brand->notes = $request->notes;
        $icon = $request->icon;
        $path='images/brands/';
        $name= time().rand(1,1000000000).'.'.$icon->getClientOriginalExtension();
        $brand->icon=$name;
        Storage::disk('public')->put($path.$name,File::get($icon));
        $brand->save();
        return redirect('/brands');
    }

    public function show(BrandRequest $request)
    {

    }


    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        if ($brand==null){
            return redirect()->back();
        }
        return view('brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request,$id)
    {
        $request->id=$id;
        $validator = $request->validated();

        $brand = Brand::where('id', $id)->first();
        $brand->name = $request->name;
        $brand->notes = $request->notes;
        if ($request->icon!=null){
            $icon = $request->icon;
            $path='images/brands/';
            Storage::disk('public')->delete($path.$brand->icon);
            Storage::disk('public')->put($path.$brand->icon,File::get($icon));
        }

        $brand->save();
        return redirect('/brands');
    }

    public function destroy($id)
    {
        Brand::where('id', $id)->delete();
        return redirect('/brands');
    }

}
