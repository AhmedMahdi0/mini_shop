<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Vendor;
use App\Models\VendorItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorItemController extends Controller
{
    public function index(Request $request, $itemId)
    {
        $vendors = Vendor::query();
        $vendors = $vendors->paginate(20);
        $queryParams = $request->except('page');
        return view('vendor-item.add-vendor', compact('itemId', 'vendors', 'queryParams'));
    }

    public function store(Request $request, $id)
    {
        $check = false;
        foreach ($request->items as $key => $value) {
            if ($value == null)
                continue;
            VendorItem::updateOrInsert(['item_id' => $id, 'vendor_id' => $key], ['quantity' => $value]);
            $check = true;
        }
        if ($check) {
            $item=Item::where('id', $id)->first();
            $item->is_purchases = true;
            $item->save();
        }
        return redirect()->to('/items');

    }

    public function show($id)
    {

    }

    public function destroy(string $id)
    {

    }
}
