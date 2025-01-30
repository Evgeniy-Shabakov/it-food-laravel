<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Product\ProductStoreRequest;
use App\Http\Resources\API\v1\Product\ProductResource;
use App\Models\Product;
use App\Models\ProductBaseIngredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductStoreController extends Controller
{
    public function __invoke(ProductStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $imageFile = $data['image_file'];
            unset($data['image_file']);

            $imageFileName = $data['title'] . '.' . $imageFile->getClientOriginalExtension();
            $imageFilePath = Storage::disk('public')->putFileAs('/images/products', $imageFile, $imageFileName);
            $imageFileUrl = url('/storage/' . $imageFilePath) . '?v=' . time();

            $data['image_path'] = $imageFilePath;
            $data['image_url'] = $imageFileUrl;

            if (isset($data['base_ingredients'])) {
                $baseIngredients = $data['base_ingredients'];
                unset($data['base_ingredients']);
            }

            if (isset($data['additional_ingredients'])) {
                $additionalIngredients = $data['additional_ingredients'];
                unset($data['additional_ingredients']);
            }

            $product = Product::create($data);

            if (isset($baseIngredients) && !empty($baseIngredients)) {
                foreach ($baseIngredients as $ingredient) {

                    $productBaseIngredient = ProductBaseIngredient::create([
                        'product_id' => $product->id,
                        'ingredient_id' => $ingredient['ingredient_id'],
                        'can_delete' => $ingredient['can_delete'],
                        'can_replace' => $ingredient['can_replace']
                    ]);

                    if ($ingredient['can_replace'] && isset($ingredient['replacements_ids'])
                        && !empty($ingredient['replacements_ids'])) {
                        $productBaseIngredient->ingredients()->attach($ingredient['replacements_ids']);
                    }

                }
            }

            if (isset($additionalIngredients) && !empty($additionalIngredients)) {
                foreach ($additionalIngredients as $ingredient) {
                    $product->additionalIngredients()->attach($ingredient['ingredient_id'], [
                        'max_quantity' => $ingredient['max_quantity'],
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return new ProductResource($product);
    }
}
