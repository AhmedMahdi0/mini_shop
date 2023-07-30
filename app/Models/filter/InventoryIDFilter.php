<?php

namespace App\Models\filter;

class InventoryIDFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        return $query->join('inventory_items', 'inventory_items.item_id', '=', 'id')
            ->join('inventories', 'inventories.id', '=', 'inventory_items.inventory_id')
            ->where('inventories.id', '=', $filter->inventory_id);
    }
}
