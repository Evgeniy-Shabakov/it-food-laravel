<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cities';
    protected $guarded = false;

    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function restaurants(){
        return $this->hasMany(Restaurant::class, 'city_id', 'id');
    }
}
