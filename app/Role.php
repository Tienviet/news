<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'display_name'
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasAccess(Permission $permissions) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    private function hasPermission(Permission $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
