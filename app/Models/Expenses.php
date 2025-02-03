<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'expenses', 
        'purpose',
        'description', 
        'reference', 
        'amount', 
        'expense_date',
        'expense_status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
