<?php


namespace App\Repositories\Admin;


use App\Models\Role;
use App\Models\RolePermission;

class RoleRepository
{
    public function getRoleList()
    {
        return Role::all();
    }

    public function getRolePage($roleName = null)
    {
        return Role::orderby('id', 'desc')
            ->where(function ($q) use ($roleName) {
                if ($roleName) {
                    $q->where('role_name', 'like', "%$roleName%");
                }
            })
            ->paginate();
    }

    public function getRoleById($roleId)
    {
        return Role::find($roleId);
    }

    public function addRole($data)
    {
        return Role::create($data);
    }

    public function getRoleByName($roleName)
    {
        return Role::where('role_name', $roleName)->first();
    }

    public function addRolePermission($data)
    {
        return RolePermission::create($data);
    }
}
