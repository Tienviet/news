<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        $role_users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('users.id', auth()->id())
            ->select('roles.*')
            ->get()->pluck('id')->toArray();

        //lay ra permission  user

        $role_users = DB::table('roles')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id', $role_users)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

        // lay ra ma man hinh de check phan quyen khi user login

        $chechPermissin = Permission::where('name', $permission)->value('id');
        // kiem tra user dc phep vao man hinh nay ko
        if ($role_users->contains($chechPermissin)){
            return $next($request);
        }
        return abort(404);
    }
}
