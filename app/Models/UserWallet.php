<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;
    protected $table = 'user_wallets';
    protected $fillable = [
        'user_ref_id',
        'current_balance',
        'transaction_balance',
        'remaining_balance'
    ];
}
