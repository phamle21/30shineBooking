<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address'
    ];

    public function service_store()
    {
        return $this->belongsToMany(ServiceStore::class);
    }

    public function user_store()
    {
        return $this->belongsToMany(UserStore::class);
    }

    public function opening()
    {
        return $this->hasMany(Store::class);
    }
}
