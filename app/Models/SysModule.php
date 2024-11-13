<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SysModule extends Model
{
    use HasFactory;
    protected $table = 'sys_modules';
    protected $fillable = ['name', 'route_name', 'link_path', 'description', 'icon', 'order_menu', 'created_by'];
    //relation to module role
    public function moduleToModuleRole(): HasMany
    {
        return $this->hasMany(SysModuleRole::class, 'sys_module_id', 'id');
    }
}
