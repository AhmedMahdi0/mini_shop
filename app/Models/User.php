<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\filter\UserFilter;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
    ];
    public function scopeFilter($query,$data)
    {
        $filter=new UserFilter();
        return $filter->scopeUser($query,$data);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

}
