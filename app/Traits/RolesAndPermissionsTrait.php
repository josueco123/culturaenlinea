<?php

namespace App\Traits;

use App\Permission;
use App\Role;

trait RolesAndPermissionsTrait
{

    // Consulta los permisos
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user', 'user_id', 'permission_id');
    }

    // Consulta los roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->with('permissions');
    }

    // Verifica si tiene un rol específico entre uno o varios roles
    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    // Verifica si tiene un permiso específico (Directo o a través de un rol)
    public function hasPermission($permission)
    {
        return $this->hasPermissionDirect($permission) || $this->hasPermissionThroughRole($permission);
    }

    // Verifica si tiene un permiso directo
    protected function hasPermissionDirect($permission)
    {
        if ($this->permissions->where('slug', $permission)->count() > 0) {
            return true;
        }
        return false;
    }

    // Verifica si tiene un permiso a traves de un rol
    protected function hasPermissionThroughRole($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('slug', $permission)) {
                return true;
            }
        }
        return false;
    }
}
