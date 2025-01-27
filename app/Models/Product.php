<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function baseIngredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'product_base_ingredients',
            'product_id',
            'ingredient_id'
        )
            ->withPivot('can_delete', 'can_replace', 'product_id');
    }
}
