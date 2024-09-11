<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'organizations';
    protected $fillable = [
        'user_ref_id',
        'name',
        'address',
        'phone',
        'join_date',
        'subscription_type',
        'subscription_period_start',
        'subscription_period_end'
    ];
}
