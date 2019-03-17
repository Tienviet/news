<?php

namespace App\Http\Controllers\Api;

use App\User;
use http\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthAPIController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
       try{
           DB::beginTransaction();
           $this->user->create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password)
           ]);
           DB::commit();
           return response()->json(['status' => 201]);
       }catch (\Exception $exception){
           DB::rollBack();
           Log::error('Loi: ' . $exception->getMessage() . $exception->getLine());
       }
    }
    public function login(Request $request){

        $http = \GuzzleHttp\Client;
    }
    public function logout(){

    }
}
