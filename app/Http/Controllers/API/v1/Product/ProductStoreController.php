<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Product\StoreRequest;
use App\Http\Resources\API\v1\Product\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductStoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $imageFile = $data['image_file'];
        unset($data['image_file']);

        $imageFileName = $data['title'] .'.'. $imageFile->getClientOriginalExtension();
        $imageFilePath = Storage::disk('public')->putFileAs('/images/products', $imageFile, $imageFileName);
        $imageFileUrl = url('/storage/' . $imageFilePath);

        $data['image_path'] = $imageFilePath;
        $data['image_url'] = $imageFileUrl;

        $product = Product::create($data);

        return new ProductResource($product);
    }
}
