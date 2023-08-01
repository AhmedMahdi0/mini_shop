<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\VendorItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryItemController extends Controller
{
    public function index()
    {

    }

    public function create($id, Request $request)
    {
        $Pagination = 20;
        $items = Item::query();
        $items = $items->paginate($Pagination);
        $inventoryId = $id;
        $queryParams = $request->except('page');
        return view('inventory.add.add-item', compact(['items', 'inventoryId', 'queryParams',]));
    }

    public function store(Request $request, $id)
    {
        foreach ($request->items as $key => $quantity) {
            if ($quantity == null)
                continue;
            $array=str_split($key);
            $item_quantity = VendorItem::where('item_id', $array[0])->where('vendor_id',$array[2])->first();
            $item_vendor = DB::table('inventory_items')->where(['inventory_id' => $id, 'item_id' => $array[0]])->first();

            if ($item_quantity->quantity < $quantity)
                continue;
            VendorItem::where('item_id', $array[0])
                ->update(['quantity' => $item_quantity->quantity - $quantity]);


            if (!$item_vendor)
                DB::table('inventory_items')
                    ->insert(['inventory_id' => $id, 'item_id' => $array[0], 'quantity' => $quantity]);
            else
                DB::table('inventory_items')
                    ->update(['quantity' => $item_vendor->quantity + $quantity]);

            $item = Item::where('id', $array[0])->first();
            $item->total_purchases = $item->total_purchases + $quantity;
            $item->is_purchases = $item_quantity->quantity > 0;
            $item->save();
        }
        return redirect('inventory/add');
    }

    public function show($id, Request $request)
    {
        $Pagination = 20;
        $items = DB::table('inventory_items')->where('inventory_id', $id)
            ->join('items', 'item_id', '=', 'items.id')
            ->join('brands', 'brand_id', '=', 'brands.id')
            ->select('items.*', 'brands.name as brand_name', 'inventory_items.quantity')
            ->paginate($Pagination);
        $inventoryId = $id;
        $queryParams = $request->except('page');
        return view('inventory.show.show-item', compact(['items', 'inventoryId', 'queryParams']));
    }


    public function destroy($id, $item_id)
    {
        $item_vendor = VendorItem::where('item_id', $item_id)->first();
        $inventory_item = DB::table('inventory_items')->where('inventory_id', $id)->where('item_id', $item_id)->first();
        VendorItem::where('item_id', $item_id)
            ->update(['quantity' => $item_vendor->quantity + $inventory_item->quantity]);

        $item = Item::where('id', $item_id)->first();
        $item->total_purchases = $item->total_purchases - $inventory_item->quantity;
        $item->is_purchases = VendorItem::where('item_id', $item_id)->first()->quantity > 0;
        $item->save();

        DB::table('inventory_items')->where('inventory_id', $id)->where('item_id', $item_id)->delete();
        return redirect('inventory/add');
    }
}
