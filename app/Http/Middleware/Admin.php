<?php

namespace App\Http\Middleware;

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
        return $next($request);
    }
}
