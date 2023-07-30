<?php

namespace App\Models\filter;


class InventoryFilter
{
    protected static $collection = ['name' => OnlyNameFilter::class, 'is_active' => IsActiveFilter::class,'phone'=>PhoneFilter::class];


    public static function scopeUser($query, $filter)
    {
        foreach ($filter->all() as $key => $value) {
            if (!array_key_exists($key, InventoryFilter::$collection)) {
                continue;
            }
            InventoryFilter::$collection[$key]::applyFilter($query, $filter);
        }
        return $query;


    }
}
