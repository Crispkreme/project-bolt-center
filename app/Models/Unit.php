<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    
    protected $table = 'units';

    protected $fillable = [
        'unit',
        'unit_slug',
        'no_products',
        'unit_status',
    ];

    protected $casts = [
        'unit_status' => 'string',
    ];
    
    protected $attributes = [
        'unit_status' => 'Active',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }
}
