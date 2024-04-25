<?php

namespace App\Models;

use App\Service\Permissions;
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

    public function isSuperAdmin()
    {
        return $this->hasRoles(Role::SUPER_ADMIN);
    }

    public function isDirector()
    {
        return $this->hasRoles(Role::DIRECTOR);
    }

    public function isAdministrator()
    {
        return $this->hasRoles(Role::ADMINISTRATOR);
    }

    public function hasRoles(string $role): bool
    {
        foreach ($this->roles->pluck('title')->all() as $roleEmployee) {
            if ($roleEmployee === $role)
                return true;
        }
        return false;
    }

    public function hasPermission(array $permission): bool
    {
        foreach ($this->roles->pluck('title')->all() as $role) {
            if (in_array($role, $permission))
                return true;
        }
        return false;
    }

    public function hasAdminPanelAccess()
    {
        return $this->hasPermission(Permissions::ADMIN_PANEL_ACCESS);
    }
}
