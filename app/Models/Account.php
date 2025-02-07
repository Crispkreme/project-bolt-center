<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'name', 
        'phone', 
        'gender', 
        'birthday', 
        'civil_status', 
        'status',
        'religion', 
        'address',
        'profile'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
