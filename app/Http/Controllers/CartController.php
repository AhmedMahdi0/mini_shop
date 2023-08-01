<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $is_admin = $request->user()->is_admin;
        $items = $request->session()->get('items');
        $queryParams = $request->except('page');
        return view('cart.cart-item', compact(['queryParams', 'items', 'is_admin']));
    }


    public function create(Request $request)
    {
        $item = Item::where('id', $request->id)->first();
        if ($item->is_purchases && $item->is_active) {
            $items = $request->session()->get('items');

            $items[$item->id] = [$item->id, $item->image, $item->name, $item->brand->name,$item->price, $request->quantity];
            $request->session()->put('items', $items);
        }
        return redirect('cart');
    }

    public function destroy(Request $request, $id)
    {
        $request->session()->forget("items.$id");
        return redirect('cart');
    }
}
