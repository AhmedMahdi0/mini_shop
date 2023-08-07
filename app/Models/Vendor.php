<?php

namespace App\Models;

use App\Models\filter\VendorFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory,SoftDeletes;


    public function scopeFilter($query,$data)
    {
        $filter=new VendorFilter();
        return $filter->scopeUser($query,$data);
    }
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    public function items()
    {
        return $this->belongsToMany(Item::class, VendorItem::class);
    }
}
