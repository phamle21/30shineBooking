<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'percent',
        'quantity',
        'start_at',
        'end_at',
    ];

    public function bookings(){
      return $this->belongsToMany(Booking::class);
    }
}
