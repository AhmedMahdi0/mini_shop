<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorInventoryController extends Controller
{

    public function create($id,Request $request)
    {
        $Pagination = 20;
        $vendors=Vendor::query();
        $vendors=$vendors->paginate($Pagination);
        $inventoryId=$id;
        $queryParams = $request->except('page');
        return view('inventory.add.add-vendor',compact(['vendors','inventoryId','queryParams']));
    }
    public function show($id,Request $request)
    {
        $Pagination = 20;
        $vendors=DB::table('vendor_inventories')->where('inventory_id',$id)->join('vendors','vendor_id','=','vendors.id')->select();
        $vendors=$vendors->paginate($Pagination);
        $inventoryId=$id;
        $queryParams = $request->except('page');
        return view('inventory.show.show-vendor',compact(['vendors','inventoryId','queryParams']));
    }



    public function store(Request $request,$id)
    {
        foreach ($request->vendors as $vendor_id){
            DB::table('vendor_inventories')->updateOrInsert(['vendor_id'=>$vendor_id,'inventory_id'=>$id]);
        }
        return redirect('inventory/add');
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        DB::table('vendor_inventories')->where('inventory_id',$id);
        return redirect('inventory/add');
    }
}
