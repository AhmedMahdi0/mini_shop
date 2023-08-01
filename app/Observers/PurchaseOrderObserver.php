<?php

namespace App\Observers;

use App\Mail\VendorEmail;
use App\Models\Item;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Mail;

class PurchaseOrderObserver
{
    /**
     * Handle the PurchaseOrder "created" event.
     */
    public function created(PurchaseOrder $purchaseOrder): void
    {
        $item=Item::where('id',$purchaseOrder->item_id)->first();
        $item->total_sales=$item->total_sales+$purchaseOrder->quantity;
        $item->save();
        $vendors=$item->vendors;
        foreach ($vendors as $vendor){
            $data=[
              'vendorName'=>$vendor->first_name,
              'productName'=>$item->name,
            ];
            Mail::to($vendor->email)
                ->cc("ahmed.h.b.mahdi@gmail.com")
                ->queue(new VendorEmail($data));
        }

    }

    /**
     * Handle the PurchaseOrder "updated" event.
     */
    public function updated(PurchaseOrder $purchaseOrder): void
    {
        //
    }

    /**
     * Handle the PurchaseOrder "deleted" event.
     */
    public function deleted(PurchaseOrder $purchaseOrder): void
    {
        //
    }

    /**
     * Handle the PurchaseOrder "restored" event.
     */
    public function restored(PurchaseOrder $purchaseOrder): void
    {
        //
    }

    /**
     * Handle the PurchaseOrder "force deleted" event.
     */
    public function forceDeleted(PurchaseOrder $purchaseOrder): void
    {
        //
    }
}
