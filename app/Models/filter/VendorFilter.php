<?php

namespace App\Models\filter;


class VendorFilter
{
    protected static $collection = ['phone' => PhoneFilter::class, 'email' => EmailFilter::class, 'name' => NameFilter::class, 'is_active' => IsActiveFilter::class];


    public static function scopeUser($query, $filter)
    {
        foreach ($filter->all() as $key => $value) {
            if(!array_key_exists($key, VendorFilter::$collection)){
                continue;
            }
            VendorFilter::$collection[$key]::applyFilter($query, $filter);
        }
        return $query;




    }
}
