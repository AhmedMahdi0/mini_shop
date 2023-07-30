<?php

namespace App\Models\filter;


class ItemFilter
{
    protected static $collection = ['name' => OnlyNameFilter::class, 'is_active' => IsActiveFilter::class ,'brand_id'=>BrandIDFilter::class
        ,'inventory_id'=>InventoryIDFilter::class,'vendor_id'=>VendorIDFilter::class,'item_number'=>ItemNumberFilter::class];


    public static function scopeUser($query, $filter)
    {
        foreach ($filter->all() as $key => $value) {
            if (!array_key_exists($key, ItemFilter::$collection)) {
                continue;
            }
            ItemFilter::$collection[$key]::applyFilter($query, $filter);
        }
        return $query;


    }
}
