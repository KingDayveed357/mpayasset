<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';
    protected $fillable = [
        'userid',
        'wallet_name',
        'wallet_type',
        'secretkeys',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
