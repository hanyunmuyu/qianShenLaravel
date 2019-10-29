<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $id = $request->get('id');
        $email = $request->get('email');
        $adminList = $this->adminRepository->getAdminList($userName, $id, $email);
        return $this->success($adminList->toArray());
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $admin = $this->adminRepository->getAdminById($id);
        $roleList = $this->roleRepository->getRoleList();
        return view('admin.admin.edit', ['admin' => $admin, 'roleList' => $roleList]);
    }

    public function add(Request $request)
    {
        $roleList = $this->roleRepository->getRoleList();

        return view('admin.admin.add', ['roleList' => $roleList]);
    }

    public function doAdd(Request $request)
    {
        $messages = [
            'user_name.required' => '用户名不可以为空',
            'password.required' => '密码不可以为空',
            'email.required' => '密码不可以为空',
            'role_id.required' => '角色不可以为空',
            'mobile.required' => '角色不可以为空',
        ];
        $rules = [
            'user_name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'mobile' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $msg = '';
            foreach ($validator->errors()->messages() as $v) {
                $msg .= $v[0];
            }
            return $this->error($msg);
        }
        $data = $request->all();
        unset($data['_token']);
        $admin = $this->adminRepository->getAdminByUserName($data['user_name']);
        if ($admin) {
            return $this->error('用户名已经被占用');
        }
        $data['password'] = Hash::make($data['password']);
        $admin = $this->adminRepository->addAdmin($data);
        if ($admin) {
            return $this->success();
        }
        return $this->error();
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
        $admin = $this->adminRepository->getAdminByUserName($data['user_name']);
        if ($admin && $admin->id != $id) {
            return $this->error('用户名已经被占用');
        }
        $this->adminRepository->updateAdmin($id, $data);
        return $this->success();
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $password = $request->get('password');
        $admin = auth('admin')->user();
        if (!Hash::check($password, $admin->password)) {
            return $this->error('密码错误');
        }
        $this->adminRepository->deleteAdmin($id);
        return $this->success();
    }
}
