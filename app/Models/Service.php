<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'time',
        'price'
    ];

    public function booking_detail(){
        return $this->belongsToMany(BookingDetail::class);
    }

    public function service_store(){
        return $this->hasMany(ServiceStore::class);
    }

    public function images(){
        return $this->hasMany(ImagesService::class);
    }
}
