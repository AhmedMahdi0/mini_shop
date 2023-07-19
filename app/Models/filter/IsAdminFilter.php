<?php

namespace App\Models\filter;

class IsAdminFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->where('is_admin', $filter->is_admin);
    }
}
