<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysModule extends Model
{
    use HasFactory;
    protected $table = 'sys_modules';
    protected $fillable = ['name', 'route_name', 'link_path', 'description', 'icon', 'order_menu', 'created_by'];
}
