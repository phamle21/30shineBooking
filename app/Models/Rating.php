<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_id',
        'start',
        'review'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    
}
