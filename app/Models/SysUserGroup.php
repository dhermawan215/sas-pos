<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysUserGroup extends Model
{
    use HasFactory;
    protected $table = 'sys_user_groups';
    protected $fillable = ['name', 'created_by'];
}
