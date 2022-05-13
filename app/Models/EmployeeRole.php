<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'employee_detail_id'
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeDetail::class);
    }
}
