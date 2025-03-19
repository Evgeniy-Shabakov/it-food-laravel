<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Ingredient\IngredientUpdateRequest;
use App\Http\Resources\API\v1\Ingredient\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IngredientToggleStopListController extends Controller
{
    public function __invoke(Ingredient $ingredient)
    {
        $ingredient->stop_list = !$ingredient->stop_list;

        $ingredient->save();

        return new IngredientResource($ingredient);
    }
}
