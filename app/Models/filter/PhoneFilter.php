<?php

namespace App\Models\filter;

class PhoneFilter implements InterfaceFilter
{
    public static function applyFilter($query, $filter)
    {
        return $query->whereRaw("phone LIKE ?", ["%{$filter->phone}%"]);
    }
}
