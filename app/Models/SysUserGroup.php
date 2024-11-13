<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SysUserGroup extends Model
{
    use HasFactory;
    protected $table = 'sys_user_groups';
    protected $fillable = ['name', 'created_by'];

    /**
     * relation to module role
     */
    public function userGroupToModuleRole(): HasMany
    {
        return $this->hasMany(SysModuleRole::class, 'sys_module_id', 'id');
    }
    /**
     * relation to user
     */
    public function userGroupToUser(): HasMany
    {
        return $this->hasMany(User::class, 'user_group_ref_id', 'id');
    }
}
