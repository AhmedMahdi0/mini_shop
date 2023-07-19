<?php

namespace App\Models\filter;

interface InterfaceFilter
{
    Public static function applyFilter($query, $filter);
}
