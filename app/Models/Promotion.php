<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'start_at',
        'end_at',
    ];

    public function bookings(){
      return $this->belongsToMany(Booking::class);
    }
}
