<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Product\ProductUpdateStopListRequest;
use App\Http\Resources\API\v1\Product\ProductResource;
use App\Models\Product;

class ProductUpdateStopListController extends Controller
{
    public function __invoke(ProductUpdateStopListRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->update($data);

        return new ProductResource($product);
    }
}
