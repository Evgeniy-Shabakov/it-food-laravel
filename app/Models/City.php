<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = false;

    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function restaurants(){
        return $this->hasMany(Restaurant::class, 'city_id', 'id');
    }
}
