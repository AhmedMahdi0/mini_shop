<?php

namespace App\Models\filter;

class NameFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$filter->name}%"]);// author Mohamed
    }
}
