<?php

namespace App\Models\filter;

class NotesFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->whereRaw("notes LIKE ?", ["%{$filter->notes}%"]);// author Mohamed
    }
}
