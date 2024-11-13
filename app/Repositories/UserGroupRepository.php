<?php

namespace App\Repositories;

use App\Http\Controllers\Admin\UserGroupController;
use App\Models\SysUserGroup;

class UserGroupRepository
{
    /**
     * save data user group
     * @param array $data
     * @return $query
     */
    public function saveData($data)
    {
        $query = SysUserGroup::create([
            'name' => $data['name'],
            'created_by' => $data['created_by']
        ]);

        return $query;
    }

    public function getDataforEdit($id)
    {
        $query = SysUserGroup::find($id);
        return $query;
    }
    /**
     * delete data from database
     * @param $id as array
     */
    public function deleteData($id)
    {
        SysUserGroup::whereIn('id', $id)->delete();
    }
    /**
     * update data user group
     * @param array
     */
    public function updateData($data): void
    {
        $query = SysUserGroup::find($data['id']);
        $query->update([
            'name' => $data['name']
        ]);
    }
}
