<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $userName = $request->get('username');
        $password = $request->get('password');
        $messages = [
            'username.required' => '用户名不可以为空',
            'password.required' => '密码不可以为空',
            'captcha.required' => '验证码不可以为空',
            'captcha.captcha' => '验证码不正确',
        ];
        $rules = [
            'captcha' => 'required|captcha',
            'username' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $msg = '';
            foreach ($validator->errors()->messages() as $v) {
                $msg .= $v[0];
            }
            return $this->error($msg);
        }
        $admin = Admin::where('user_name', $userName)->first();
        if (!$admin) {
            return $this->error('用户不存在');
        }
        if (!Hash::check($password, $admin->password)) {
            return $this->error('用户或者密码错误');
        }
        auth('admin')->login($admin);
        return $this->success();
    }
}
