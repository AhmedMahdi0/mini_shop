<?php

namespace App\Models\filter;

class OnlyNameFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->whereRaw("name LIKE ?", ["%{$filter->name}%"]);// author Mohamed
    }
}
