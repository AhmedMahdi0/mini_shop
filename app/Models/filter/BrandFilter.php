<?php

namespace App\Models\filter;


class BrandFilter
{
    protected static $collection = ['name' => OnlyNameFilter::class, 'notes' => NotesFilter::class];


    public static function scopeUser($query, $filter)
    {
        foreach ($filter->all() as $key => $value) {
            if (!array_key_exists($key, BrandFilter::$collection)) {
                continue;
            }
            BrandFilter::$collection[$key]::applyFilter($query, $filter);
        }
        return $query;


    }
}
