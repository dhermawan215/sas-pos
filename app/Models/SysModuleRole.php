<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SysModuleRole extends Model
{
    use HasFactory;

    protected $table = 'sys_module_roles';
    protected $fillable = ['sys_module_id', 'sys_user_group_id', 'is_access', 'permission'];
    /**
     * relation to model sys module
     */
    public function sysModuletoModule(): BelongsTo
    {
        return $this->belongsTo(SysModule::class, 'sys_module_id', 'id');
    }
    /**
     * relation to user group
     */
    public function sysModuletoUserGroup(): BelongsTo
    {
        return $this->belongsTo(SysUserGroup::class, 'sys_user_group_id', 'id');
    }
}
