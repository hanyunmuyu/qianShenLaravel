<?php


namespace App\Repositories\Admin;


use App\Models\Permission;

class PermissionRepository
{
    public function getPermissionList()
    {
        return Permission::where('parent_id', '>', 0)->get();
    }
}
