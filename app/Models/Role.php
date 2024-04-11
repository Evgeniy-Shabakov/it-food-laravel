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
    const DIRECTOR = 'Директор';
    const ADMINISTRATOR = 'Администратор';
    const MENU_MANAGER = 'Менеджер меню';
    const ORDER_MANAGER = 'Менеджер заказов';
    const COURIER = 'Курьер';
    const CUSTOMER = 'Клиент';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
