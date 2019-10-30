<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $userName = $request->get('userName');
        $password = $request->get('password');
        $messages = [
            'userName.required' => '用户名不可以为空',
            'password.required' => '密码不可以为空',
        ];
        $rules = [
            'userName' => 'required',
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
        $user = User::where('user_name', $userName)
            ->orWhere('mobile', $userName)
            ->first();
        if (!$user) {
            return $this->error();
        } else {
            if (!Hash::check($password, $user->password)) {
                return $this->error('密码错误');
            }
        }
        if (!$token = auth('api')->login($user)) {
            return $this->error();
        }
        return $this->respondWithToken($token, $user->toArray());
    }


    protected function respondWithToken($token, $user)
    {
        return $this->success([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL(),
            'user' => $user,
        ]);
    }
}
