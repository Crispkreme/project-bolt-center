<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'categories';

    protected $fillable = [
        'category',
        'category_slug',
        'category_status',
    ];

    protected $casts = [
        'category_status' => 'string',
    ];
    
    protected $attributes = [
        'category_status' => 'Active',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }
}
