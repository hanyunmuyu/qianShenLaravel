<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function list(Request $request)
    {
        $id = $request->get('id');
        $username = $request->get('username');
        $userList = $this->userRepository->getUserList($id, $username);
        return $this->success($userList->toArray());
    }
}
