<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'stylist_id',
        'user_id',
        'store_id',
        'promotion_id',
        'booking_at',
        'total',
        'status',
    ];

    public function detail()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function promotion()
    {
        return $this->hasOne(Promotion::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function stylist()
    {
        return $this->belongsTo(User::class, 'stylist_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }


}
