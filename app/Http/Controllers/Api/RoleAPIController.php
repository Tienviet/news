<?php

namespace App\Http\Controllers\Api;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleAPIController extends Controller
{
    protected $roles;

    public function __construct(Role $role)
    {
        $this->roles = $role;
    }

    public function index()
    {
        $data = $this->roles->all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $roleCreate = $this->roles->create([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);

            $roleCreate->permissions()->attach($request->permission);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Loi: ' . $exception->getMessage() . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $permissionId = DB::table('permission_role')->where('role_id', $id)->pluck('permission_id');

        $data = DB::table('permission')->where('id', $permissionId)->get();

        return $data;
    }
}
