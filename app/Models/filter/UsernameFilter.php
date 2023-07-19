<?php

namespace App\Models\filter;

class UsernameFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->where('username', $filter->username);
    }
}
