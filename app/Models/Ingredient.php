<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $guarded = false;

    public function replacements()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'ingredient_replacements',
            'ingredient_id',
            'replacement_id'
        );
    }
}