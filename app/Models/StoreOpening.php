<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'note'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
