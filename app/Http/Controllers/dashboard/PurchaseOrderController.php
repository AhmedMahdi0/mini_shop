<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index($id)
    {
        $purchase = PurchaseOrder::where('user_id', $id)->paginate(40);
        return view('order.order-item', compact('purchase'));
    }


    public function store(Request $request, $id)
    {
        foreach ($request->session()->get('items') as $key => $value) {
            $item = Item::where('id', $key)->first();
            if ($item->is_active && $this->checkQuantityInInventory($key, $value[5])) {
                $inventories = $this->getInventoryId($key);

                foreach ($inventories as $inventory) {
                    if ($value[5] <= $inventory->quantity) {
                        $purchase = new PurchaseOrder();
                        $purchase->user_id = $id;
                        $purchase->status = 'in-progress';
                        $purchase->item_id = $key;
                        $purchase->quantity = $value[5];
                        $purchase->inventory_id = $inventory->inventory_id;
                        $purchase->save();

                        $item->total_sales = $item->total_sales - $value[5];
                        $newQuantity=$inventory->quantity - $value[5];
                        DB::table('inventory_items')
                            ->where(['item_id' => $key, 'inventory_id' => $inventory->inventory_id])
                            ->update(['quantity' => $newQuantity]);

                        $item->save();
                        break;
                    } else {
                        $purchase = new PurchaseOrder();
                        $purchase->user_id = $id;
                        $purchase->status = 'in-progress';
                        $purchase->item_id = $key;
                        $purchase->quantity = $inventory->quantity;
                        $purchase->inventory_id = $inventory->inventory_id;
                        $purchase->save();

                        $item->total_sales = $item->total_sales + $inventory->quantity;
                        DB::table('inventory_items')
                            ->where(['item_id' => $key, 'inventory_id' => $inventory->inventory_id])
                            ->update(['quantity' => 0]);
                        $item->save();
                    }

                }


            }
        }
        $request->session()->forget('items');
        return redirect()->to("order/list/$id");
    }

    private function getInventoryId($id)
    {
        $inventory = DB::table('inventory_items')
            ->where('item_id', $id)
            ->orderBy('quantity', 'DESC')
            ->get();

        return $inventory;

    }

    private function checkQuantityInInventory($id, $quantity)
    {
        $inventory = DB::table('inventory_items')
            ->select('item_id', DB::raw('SUM(quantity) as sum_quantity'))
            ->where('item_id', $id)
            ->groupBy('item_id')
            ->first();
        if ($inventory==null)
            return false;
        return $inventory->sum_quantity >= $quantity;
    }
}
