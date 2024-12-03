<?php

namespace App\Http\Controllers\API\v1\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Ingredient\IngredientUpdateRequest;
use App\Http\Resources\API\v1\Ingredient\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;

class IngredientUpdateController extends Controller
{
    public function __invoke(IngredientUpdateRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();

        if (isset($data['image_file'])) {
            $imageFile = $data['image_file'];
            unset($data['image_file']);

            Storage::disk('public')->delete($ingredient->image_path);

            $imageFileName = $data['title'] .'.'. $imageFile->getClientOriginalExtension();
            $imageFilePath = Storage::disk('public')->putFileAs('/images/ingredients', $imageFile, $imageFileName);
            $imageFileUrl = url('/storage/' . $imageFilePath) . '?v=' . time();

            $data['image_path'] = $imageFilePath;
            $data['image_url'] = $imageFileUrl;
        }

        if ($data['description'] == 'null') $data['description'] = '';

        $ingredient->update($data);

        return new IngredientResource($ingredient);
    }
}
