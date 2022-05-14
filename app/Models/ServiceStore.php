<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'store_id'
    ];

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
