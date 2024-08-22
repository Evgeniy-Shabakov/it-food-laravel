<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $guarded = false;

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_address_id', 'id');
    }
}
