<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'time',
        'price'
    ];

    public function booking_detai(){
        return $this->belongsToMany(BookingDetail::class);
    }

    public function service_store(){
        return $this->belongsToMany(ServiceStore::class);
    }
}
