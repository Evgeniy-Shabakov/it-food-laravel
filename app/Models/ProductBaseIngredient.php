<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBaseIngredient extends Model
{
    use HasFactory;

    protected $table = 'product_base_ingredients';
    protected $guarded = false;

    public function ingredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'product_base_ingredient_replacements',
            'product_base_ingredient_id',
            'replacement_ingredient_id'
        );
    }
}
