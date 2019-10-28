<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $adminRepository;
    private $roleRepository;

    public function __construct(AdminRepository $adminRepository, RoleRepository $roleRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('admin.admin.index');
    }

    public function list(Request $request)
    {
        $userName = $request->get('userName');
        $adminList = $this->adminRepository->getAdminList($userName);
        return $this->success($adminList->toArray());
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $admin = $this->adminRepository->getAdminById($id);
        $roleList = $this->roleRepository->getRoleList();
        return view('admin.admin.edit', ['admin' => $admin, 'roleList' => $roleList]);
    }

    public function update(Request $request)
    {

        $id = $request->get('id');
        $data = $request->all();
        unset($data['_token']);
        $admin = $this->adminRepository->getAdminById($id);
        if (!$admin) {
            return $this->error();
        }
        if (isset($data['password']) && $data['password']) {
            $data['password'] = Hash::make($data['password']);
        }
        $this->adminRepository->updateAdmin($id, $data);
        return $this->success();
    }
}
