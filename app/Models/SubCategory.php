<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $table = 'sub_categories';
    protected $fillable = [
        'category_id',
        'sub_category',
        'sub_category_slug',
        'description',
        'sub_category_status',
    ];

    protected $casts = [
        'sub_category_status' => 'string',
    ];
    
    protected $attributes = [
        'sub_category_status' => 'Active',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }
}
