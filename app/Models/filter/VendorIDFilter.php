<?php

namespace App\Models\filter;

class VendorIDFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->join('vendor_items', 'vendor_items.item_id', '=', 'id')
            ->join('vendors', 'vendors.id', '=', 'vendor_items.vendor_id')
            ->where('vendors.id', '=', $filter->vendor_id);
    }
}
