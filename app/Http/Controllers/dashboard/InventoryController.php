<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use App\Models\City;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $Pagination = 20;
        $inventories = Inventory::query();
        $inventories = $inventories->filter($request);
        $inventories = $inventories->paginate($Pagination);
        $queryParams = $request->except('page');
        return view('inventory.list-inventory',compact(['inventories','queryParams']));
    }

    public function create()
    {
        $cities=City::get();
        return view('inventory.create',compact('cities'));
    }

    public function store(InventoryRequest $request)
    {
        $validator = $request->validated();
        $inventory=new Inventory();
        $inventory->name = $request->name;
        $inventory->phone = $request->phone;
        $inventory->city_id = $request->city;
        $inventory->is_active = $request->is_active;
        $inventory->save();
        return redirect('/inventory');
    }

    public function show(Request $request)
    {
        $Pagination = 20;
        $inventories = Inventory::query();
        $inventories = $inventories->filter($request);
        $inventories = $inventories->paginate($Pagination);
        $queryParams = $request->except('page');
        return view('inventory.add-item',compact(['inventories','queryParams']));
    }

    public function edit($id)
    {
        $inventory = Inventory::where('id', $id)->first();
        $cities=City::get();
        if ($inventory==null){
            return redirect()->back();
        }
        return view('inventory.edit', compact(['inventory','cities']));
    }

    public function update(Request $request, $id)
    {
        $request->id=$id;
//        $validator = $request->validated();

        $inventory = Inventory::where('id', $id)->first();
        $inventory->name = $request->name;
        $inventory->phone = $request->phone;
        $inventory->city_id = $request->city;
        $inventory->is_active = $request->is_active;
        $inventory->save();
        return redirect('/inventory');
    }

    public function destroy($id)
    {
        Inventory::where('id', $id)->delete();
        return redirect('/brands');
    }
}
