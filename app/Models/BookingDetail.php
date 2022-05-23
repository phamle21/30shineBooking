<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->hasOne(Service::class,'id', 'service_id');
    }

    public function promotion(){
        return $this->hasOne(Promotion::class);
    }
}
