<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'userid',
        'recipient_id',
        'crypto_type',
        'amount',
        'crypto_amount',
        'recipient_address',
        'status',
        'transaction_reference',
        'transaction_type',
        'date'
    ];

    // Optionally, define relationships (e.g., linking to the User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
