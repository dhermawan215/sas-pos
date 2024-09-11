<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'organization_ref_id',
        'order_ID',
        'order_date',
        'order_period',
        'total',
        'paid_amount',
        'change_amount'
    ];
}
