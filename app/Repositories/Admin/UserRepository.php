<?php


namespace App\Repositories\Admin;


use App\User;

class UserRepository
{
    public function getUserList($id = null, $username = null)
    {
        return User::orderby('id', 'desc')
            ->where(function ($q) use ($id) {
                if ($id) {
                    $q->where('id', $id);
                }
            })
            ->where(function ($q) use ($username) {
                if ($username) {
                    $q->where('user_name', $username);
                }
            })
            ->paginate();
    }
}
