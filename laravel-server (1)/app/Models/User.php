<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'userid',
        'name',
        'email',
        'status',
        'crypto_address',
        'profile_picture',
        'role',
        'pin',
        'otp',
        'main_balance',
        'otp_expires_at',
        'reset_token',
        'bitcoin_balance',
        'ethereum_balance',
        'binancecoin_balance',
        'tron_balance',
        'tether_balance',
        'usd_coin_balance',
        'doge_balance',
        'kyc',
        'passFront',
        'passBack',
        'reset_token_expires',
        'kstatus',
        'kyc_document_1', // Added field
        'kyc_document_2'  // Added field
    ];
    

    protected $hidden = [
        'userid',
        'pin',
        'otp',
        'reset_token',
        'remember_token',
        'kyc_document_1' => null,
    ];
}
