<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\PermissionRepository;
use App\Repositories\Admin\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        return view('admin.role.index');
    }

    public function list(Request $request)
    {
        $roleName = $request->get('role_name');
        $roleList = $this->roleRepository->getRolePage($roleName);
        return $this->success($roleList->toArray());
    }

    public function add()
    {
        $permissionList = $this->permissionRepository->getPermissionList();
        return view('admin.role.add', ['permissionList' => $permissionList]);
    }

    public function doAdd(Request $request)
    {
        $data['role_name'] = $request->get('role_name');
        $permissionList = $request->get('permission');
        if (!$permissionList) {
            return $this->error('请选择权限');
        }
        $role = $this->roleRepository->getRoleByName($data['role_name']);
        if ($role) {
            return $this->error('角色已经存在');
        }
        DB::beginTransaction();
        $role = $this->roleRepository->addRole($data);
        if ($role) {
            if ($permissionList) {
                foreach ($permissionList as $permission) {
                    $data = [];
                    $data['role_id'] = $role->id;
                    $data['permission_id'] = $permission;
                    $this->roleRepository->addRolePermission($data);
                }
            }
        } else {
            DB::rollBack();
            return $this->error();
        }
        DB::commit();
        return $this->success();
    }
}
