<?php


namespace App\Repositories\Admin;


use App\Models\Role;

class RoleRepository
{
    public function getRoleList()
    {
        return Role::all();
    }
}
