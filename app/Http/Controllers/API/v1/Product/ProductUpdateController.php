<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Product\ProductUpdateRequest;
use App\Http\Resources\API\v1\Product\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductUpdateController extends Controller
{
    public function __invoke(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['image_file'])) {
            $imageFile = $data['image_file'];
            unset($data['image_file']);

            Storage::disk('public')->delete($product->image_path);

            $imageFileName = $data['title'] .'.'. $imageFile->getClientOriginalExtension();
            $imageFilePath = Storage::disk('public')->putFileAs('/images/products', $imageFile, $imageFileName);
            $imageFileUrl = url('/storage/' . $imageFilePath) . '?v=' . time();

            $data['image_path'] = $imageFilePath;
            $data['image_url'] = $imageFileUrl;
        }

        if ($data['description_short'] == 'null') $data['description_short'] = '';
        if ($data['description_full'] == 'null') $data['description_full'] = '';

        $product->update($data);

        return new ProductResource($product);
    }
}
