<?php

namespace Modules\Pengguna\Entities;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    protected $table = 'roles';
    protected $fillable = ['name', 'description', 'guard_name'];

}
