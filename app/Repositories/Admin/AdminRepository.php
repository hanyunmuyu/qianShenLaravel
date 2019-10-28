<?php


namespace App\Repositories\Admin;


use App\Admin;

class AdminRepository
{
    public function getAdminList($userName = null)
    {
        return Admin::orderby('id', 'desc')
            ->where(function ($q) use ($userName) {
                if ($userName) {
                    $q->where('admins.user_name', 'like', "%$userName%");
                }
            })
            ->paginate();
    }

    public function getAdminById($id)
    {
        return Admin::find($id);
    }

    public function updateAdmin($adminId,$data)
    {
        return Admin::where('id', $adminId)->update($data);
    }
}
