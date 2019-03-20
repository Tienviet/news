<?php
/**
 * Created by PhpStorm.
 * User: tienviet
 * Date: 3/20/19
 * Time: 3:32 PM
 */

namespace App\Services;


use App\User;

class UserService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        $data = $this->user->all();
        return response()->json($data);
    }
}
