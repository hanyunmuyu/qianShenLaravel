<?php


namespace App\Repositories\Admin;


use App\Admin;

class AdminRepository
{
    public function getAdminList($userName = null, $id = null, $email = null)
    {
        return Admin::orderby('id', 'desc')
            ->where(function ($q) use ($userName) {
                if ($userName) {
                    $q->where('admins.user_name', 'like', "%$userName%");
                }
            })
            ->where(function ($q) use ($id) {
                if ($id) {
                    $q->where('id', $id);
                }
            })
            ->where(function ($q) use ($email) {
                if ($email) {
                    $q->where('email', 'like', "%$email%");
                }
            })
            ->paginate();
    }

    public function getAdminById($id)
    {
        return Admin::find($id);
    }

    public function getAdminByUserName($userName)
    {
        return Admin::where('user_name', $userName)->first();
    }

    public function updateAdmin($adminId, $data)
    {
        return Admin::where('id', $adminId)->update($data);
    }

    public function addAdmin($data)
    {
        return Admin::create($data);
    }

    public function deleteAdmin($adminId)
    {
        return Admin::where('id', $adminId)->delete();
    }
}
