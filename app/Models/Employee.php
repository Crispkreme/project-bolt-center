<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'experience',
        'salary',
        'leave',
        'hired_date',
        'resign_date',
        'isActive',
        'status',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
