<?php

namespace App\Models\filter;

class BrandIDFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->where('brand_id', $filter->brand_id);
    }
}
