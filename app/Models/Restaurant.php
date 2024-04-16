<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';
    protected $guarded = false;

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
