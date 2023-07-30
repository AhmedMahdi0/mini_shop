<?php

namespace App\Models;

use App\Models\filter\BrandFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    use HasFactory,SoftDeletes;
    public function scopeFilter($query,$data)
    {
        $filter=new BrandFilter();
        return $filter->scopeUser($query,$data);
    }
}
