<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'service_id'
    ];

    function service(){
        return $this->belongsTo(Service::class);
    }
}
