<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table ='purchase_orders';
    protected $primaryKey=['item_id','user_id','inventory_id','created_at'];
    public $incrementing = false;
    protected $keyType = ['string', 'string','string','string'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function item()
    {
        return $this->hasOne(Item::class,'id','item_id');
    }
    public function inventory()
    {
        return $this->hasOne(Inventory::class,'id','inventory_id');
    }
}
