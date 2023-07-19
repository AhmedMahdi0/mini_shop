<?php

namespace App\Models\filter;


class UserFilter
{
    protected static $collection = ['username' => UsernameFilter::class, 'email' => EmailFilter::class, 'name' => NameFilter::class, 'is_active' => IsActiveFilter::class, 'is_admin' => IsAdminFilter::class];


    public static function scopeUser($query, $filter)
    {
//      ******************************
//        $this->collection=collect(['username'=>$this->scopeUsername($query, $filter), 'email'=>$this->scopeEmail($query, $filter)
//            , 'name'=>$this->scopeName($query, $filter), 'is_active'=>$this->scopeIsActive($query, $filter), 'is_admin'=>$this->scopeIsAdmin($query, $filter)]);
//
//      *******************************
//        foreach ($filter->all() as $key => $value) {
//            $query->where($key, $value);
//        }
//        return $query;



        foreach ($filter->all() as $key => $value) {
            if(!array_key_exists($key, UserFilter::$collection)){
                continue;
            }
            UserFilter::$collection[$key]::applyFilter($query, $filter);
         }
        return $query;




    }
}
