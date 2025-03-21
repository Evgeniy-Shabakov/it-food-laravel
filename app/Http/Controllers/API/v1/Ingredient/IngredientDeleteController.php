<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;

class IngredientDeleteController extends Controller
{
    public function __invoke(Ingredient $ingredient)
    {
        $deletedStatus = $ingredient->delete();

        if ($deletedStatus) {
            Storage::disk('public')->delete($ingredient->image_path);
        }

        return 'OK';
    }
}
