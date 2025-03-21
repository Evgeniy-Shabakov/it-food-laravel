<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Product\ProductResource;
use App\Models\Product;

class ProductToggleIsInStopListController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->is_in_stop_list = !$product->is_in_stop_list;

        $product->save();

        return new ProductResource($product);
    }
}
