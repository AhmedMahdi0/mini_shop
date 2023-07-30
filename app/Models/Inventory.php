<?php

namespace App\Models;

use App\Models\filter\InventoryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function scopeFilter($query,$data)
    {
        $filter=new InventoryFilter();
        $filter->scopeUser($query,$data);
    }
}
