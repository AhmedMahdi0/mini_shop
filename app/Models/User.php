<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\filter\UserFilter;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $hidden = ["password"];

    protected $fillable = [
        "password",
        "username",
        "email",
        "first_name",
        "last_name",
        "is_active",
        "is_admin",
    ];
    public function scopeFilter($query, $data)
    {
        $filter = new UserFilter();
        return $filter->scopeUser($query, $data);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => "$this->first_name $this->last_name",
        );
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

}
