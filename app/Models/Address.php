<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;

    protected $hidden=[
        "addressable_type",
        "addressable_id"
    ];

    public function city()
    {
        return $this->hasOne(City::class,'id','city_id');
    }

    public function addressable()
    {
        return $this->morphTo();
    }
}
