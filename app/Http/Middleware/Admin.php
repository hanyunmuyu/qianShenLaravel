<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\RolePermission;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth('admin')->check()) {
            if ($request->ajax()) {
                return response()->json(['code' => '4000', 'msg' => '认证失败']);
            } else {
                return redirect(admin_url('/login'));
            }
        }
        if (!$request->ajax()) {
            $admin = $request->user('admin');
            $permissions = Permission::where('parent_id', 0)->orderby('rank', 'desc')->get();
            if ($admin->role_id != 1) {
                $rolePermissions = Permission::leftjoin('role_permissions', 'role_permissions.permission_id', '=', 'permissions.id')
                    ->select('permissions.*')
                    ->where('permissions.parent_id', '>', 0)
                    ->where('role_permissions.role_id', $admin->role_id)
                    ->get();
            } else {
                $rolePermissions = Permission::where('parent_id', '>', 0)->orderby('rank', 'desc')->get();
            }
            $map = [];
            foreach ($rolePermissions as $p) {
                $map[$p->parent_id][] = $p;
            }
            foreach ($permissions as $k => $permission) {
                if (isset($map[$permission->id])) {
                    $permission->subList = $map[$permission->id];
                } else {
                    $permission->subList = [];
                }
                $permissions[$k] = $permission;
            }
            view()->share('permissionList', $permissions);
        }
        return $next($request);
    }
}
