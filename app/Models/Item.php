<?php

namespace App\Models;

use App\Models\filter\ItemFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeFilter($query, $data)
    {
        $filter=new ItemFilter();
        return $filter->scopeUser($query,$data);
    }
    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
    public function item()
    {
        return $this->hasMany(VendorItem::class);
    }
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, VendorItem::class);
    }
}
