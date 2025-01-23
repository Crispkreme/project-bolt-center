<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $table = 'entities';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'entity_type',
        'profile',
        'entity_status',
    ];

    protected $casts = [
        'entity_type' => 'string',
        'entity_status' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeSuppliers($query)
    {
        return $query->where('entity_type', 'Supplier');
    }

    public function scopeActive($query)
    {
        return $query->where('entity_status', 'Active');
    }

    public function scopeCustomers($query)
    {
        return $query->where('entity_type', 'Customer');
    }
}
