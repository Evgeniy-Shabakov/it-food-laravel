<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Ingredient\IngredientUpdateRequest;
use App\Http\Resources\API\v1\Ingredient\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IngredientUpdateController extends Controller
{
    public function __invoke(IngredientUpdateRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            if (isset($data['image_file'])) {
                $imageFile = $data['image_file'];
                unset($data['image_file']);

                Storage::disk('public')->delete($ingredient->image_path);

                $imageFileName = $data['title'] . '.' . $imageFile->getClientOriginalExtension();
                $imageFilePath = Storage::disk('public')->putFileAs('/images/ingredients', $imageFile, $imageFileName);
                $imageFileUrl = url('/storage/' . $imageFilePath) . '?v=' . time();

                $data['image_path'] = $imageFilePath;
                $data['image_url'] = $imageFileUrl;
            }

            if ($data['description'] == 'null') $data['description'] = '';

            if(isset($data['ingredient_ids']))
            {
                $ingredientIds = ($data['ingredient_ids']);
                unset($data['ingredient_ids']);
            }

            $ingredient->update($data);

            // Выполняем sync даже если $ingredientIds пустой
            $ingredient->replacements()->sync($ingredientIds ?? []);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return new IngredientResource($ingredient);
    }
}
