<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'booking_id',
        'price',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function promotion(){
        return $this->hasOne(Promotion::class);
    }
}
