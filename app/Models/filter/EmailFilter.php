<?php

namespace App\Models\filter;

class EmailFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->where('email', $filter->email);
    }
}
