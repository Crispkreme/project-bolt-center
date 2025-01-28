<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'companies';

    protected $fillable = [
        'user_id',
        'supplier_id',
        'company_name',
        'company_email',
        'company_phone',
        'company_website',
        'address',
        'industry',
        'company_status',
    ];

    protected $casts = [
        'company_status' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Entity::class);
    }
}
