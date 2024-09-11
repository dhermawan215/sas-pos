<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWalletTransaction extends Model
{
    use HasFactory;
    protected $table = 'user_wallet_transactions';
    protected $fillable = [
        'user_ref_id',
        'organization_ref_id',
        'transaction_name',
        'transaction_date',
        'transaction_type',
        'subscription_period'
    ];
}
