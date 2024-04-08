<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roles';
    protected $guarded = false;

    const SUPER_ADMIN = 'super-admin';
    const DIRECTOR = 'director';
    const ADMINISTRATOR = 'administrator';
    const MENU_MANAGER = 'menu-manager';
    const ORDER_MANAGER = 'order-manager';
    const COURIER = 'courier';
    const CUSTOMER = 'customer';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
