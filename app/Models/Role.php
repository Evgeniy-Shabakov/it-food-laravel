<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = false;

    const SUPER_ADMIN = 'super-admin';
    const SUPER_ADMIN_DESCRIPTION = 'Роль супер-админа';

    const DIRECTOR = 'Директор';
    const DIRECTOR_DESCRIPTION = 'Доступны все возможности';

    const ADMINISTRATOR = 'Администратор';
    const ADMINISTRATOR_DESCRIPTION = 'Доступны все возможности, кроме изменений данных директора';

    const MENU_MANAGER = 'Менеджер меню';
    const MENU_MANAGER_DESCRIPTION = 'Доступно изменение категорий и товаров';

    const ORDER_MANAGER = 'Менеджер заказов';
    const ORDER_MANAGER_DESCRIPTION = 'Доступно изменение статуса заказов';

    const COURIER = 'Курьер';
    const COURIER_DESCRIPTION = 'Доступно изменение статуса заказов на "доставлено"';

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_role', 'role_id', 'employee_id');
    }
}
