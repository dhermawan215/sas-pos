<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;
    protected $table = 'user_logs';
    protected $fillable = [
        'user_ref_id',
        'email',
        'ip_address',
        'user_agent',
        'activity',
        'status',
        'recorded'
    ];
}
