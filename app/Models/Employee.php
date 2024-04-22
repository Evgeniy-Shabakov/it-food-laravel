<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'employee_role', 'employee_id', 'role_id');
    }

    public function hasPermission(array $permission): bool
    {
        foreach ($this->roles->pluck('title')->all() as $role) {
            if(in_array($role, $permission))
                return true;
        }
        return false;
    }
}
