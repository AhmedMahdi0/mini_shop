<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Brand;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $Pagination = 20;

        $items = Item::query();
        $brands = Brand::all();
        $inventories = Inventory::all();
        $vendors = Vendor::all();
        $items = $items->filter($request);
        $queryParams = $request->except('page');
        $items = $items->paginate($Pagination);
        return view('item.list-item', compact(['items','queryParams','brands','inventories','vendors']));
    }


    public function create()
    {
        $brands=Brand::class::get();
        return view('item.create',compact(['brands']));
    }

    public function store(ItemRequest $request)
    {
        $validator = $request->validated();
        $item=new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->is_active = $request->is_active;
        $item->brand_id=$request->brand_id;
        $item->is_purchases = false;
        $image = $request->image;
        $path='images/items/';
        $name= time().rand(1,1000000000).'.'.$image->getClientOriginalExtension();
        $item->image=$name;
        Storage::disk('public')->put($path.$name,File::get($image));
        $item->save();
        return redirect('/items');
    }


    public function show(Item $item)
    {
        //
    }

    public function edit($id)
    {
        $brands=Brand::class::get();
        $item = Item::where('id', $id)->first();
        if ($item == null) {
            return redirect()->back();
        }
        return view('item.edit', compact(['item','brands']));
    }

    public function update(UpdateItemRequest $request,$id)
    {
        $request->id=$id;

        $validator = $request->validated();

        $item = Item::where('id', $id)->first();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->is_active = $request->is_active;
        $item->brand_id=$request->brand_id;
        if ($request->image!=null){
            $image = $request->image;
            $path='images/items/';
            Storage::disk('public')->delete($path.$item->image);
            Storage::disk('public')->put($path.$item->image,File::get($image));
        }

        $item->save();
        return redirect('/items');
    }

    public function destroy($id)
    {
        Item::where('id', $id)->delete();
        return redirect('/items');
    }
}
