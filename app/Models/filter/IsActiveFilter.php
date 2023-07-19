<?php

namespace App\Models\filter;

class IsActiveFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->where('is_active', $filter->is_active);
    }
}
