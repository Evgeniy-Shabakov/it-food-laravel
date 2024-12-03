<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Ingredient\IngredientResource;
use App\Models\Ingredient;

class IngredientShowController extends Controller
{
    public function __invoke(Ingredient $ingredient)
    {
        return new IngredientResource($ingredient);
    }
}
