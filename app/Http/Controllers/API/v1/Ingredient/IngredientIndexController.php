<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Ingredient\IngredientResource;
use App\Models\Ingredient;

class IngredientIndexController extends Controller
{
    public function __invoke()
    {
        $ingredients = Ingredient::all();

        return IngredientResource::collection($ingredients);
    }
}
