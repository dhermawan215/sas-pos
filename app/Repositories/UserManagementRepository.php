<?php

namespace App\Repositories;

use App\Models\SysUserGroup;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementRepository
{
    /**
     * repository for admin user management
     * this project implenet solid pattern
     */

    /**
     * get user group data
     * @return eloquent
     */
    public function getUserGroup()
    {
        $query = SysUserGroup::toBase()->get();
        return $query;
    }
    /**
     * register new user
     */
    public function registerUser($request)
    {
        $query =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active,
            'user_group_ref_id' => $request->group_user
        ]);
        return $query;
    }
    /**
     * change usert active status
     * @param id and acctive value
     */
    public function setUserActive($id, $activeValue): void
    {
        $query = User::findOrFail($id);
        $query->update(['is_active' => $activeValue]);
    }
}
