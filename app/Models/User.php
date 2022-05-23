<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'users';

    protected $fillable = [
        'role',
        'fullname',
        'email',
        'phone',
        'email_verified_at',
        'username',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee_detail()
    {
        return $this->hasOne(EmployeeDetail::class);
    }

    public function reward_point()
    {
        return $this->hasOne(RewardPoint::class);
    }

    public function notify()
    {
        return $this->hasMany(Notify::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function user_store()
    {
        return $this->belongsToMany(UserStore::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function isAdmin()
    {
        return $this->role === UserRole::Admin;
    }

    public function isAdminStore()
    {
        return $this->role === UserRole::Admin_Store;
    }

    public function roleName()
    {
        return UserRole::getKey($this->role);
    }
}
