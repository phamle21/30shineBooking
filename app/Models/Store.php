<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

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
