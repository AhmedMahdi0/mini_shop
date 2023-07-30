<?php

namespace App\Models\filter;

use Illuminate\Support\Facades\DB;

class ItemNumberFilter implements InterfaceFilter
{

    public static function applyFilter($query, $filter)
    {
        $subquery = DB::table('inventory_items')
            ->select('item_id', DB::raw('SUM(quantity) as sum_quantity'))
            ->groupBy('item_id')
            ->having('sum_quantity', '>=', 50);

        return $query->joinSub($subquery, 'inventory_item_sum', function ($join) {
            $join->on('items.id', '=', 'inventory_item_sum.item_id');
        })->select('items.*');
    }
}
