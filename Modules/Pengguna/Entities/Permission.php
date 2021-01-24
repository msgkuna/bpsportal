<?php

namespace Modules\Pengguna\Entities;

use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    protected $table = 'permissions';
    protected $fillable = ['name', 'description', 'guard_name'];

}
