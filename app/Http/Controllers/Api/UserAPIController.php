<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserAPIController extends Controller
{
    protected $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }

    public function index()
    {
        $data = $this->users->all();
        return $data;
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $this->users->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $roles = $request->role;
//            dd($roles);
            foreach ($roles as $roleItem) {
                DB::table('role_user')->insert([
                    'user_id' => $data->id,
                    'role_id' => $roleItem
                ]);
            }
            DB::commit();
            return $data;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Loi: ' . $exception->getMessage() . $exception->getLine());
        }

    }

    public function edit($id)
    {
        $data = $this->users->findOrFail($id);
        return $data;
    }

    public function getRoleId($id)
    {
        $roleUser = DB::table('role_user')->where('user_id', $id)->value('role_id');
        return $roleUser;
    }
}
