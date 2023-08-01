<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorItem extends Model
{
    use HasFactory;
    protected $table ='vendor_items';
    protected $primaryKey=['item_id','vendor_id'];
    public $incrementing = false;
    protected $keyType = ['string', 'string'];

}
