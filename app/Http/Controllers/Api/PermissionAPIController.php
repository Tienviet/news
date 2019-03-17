<?php
/**
 * Created by PhpStorm.
 * User: vuaku
 * Date: 1/20/2019
 * Time: 9:31 PM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Permission;

class PermissionAPIController extends Controller
{
    protected $permissions;

    public function __construct(Permission $permission)
    {
        $this->permissions = $permission;
    }


    public function index()
    {
        $data = $this->permissions->all();
        return $data;

    }

}