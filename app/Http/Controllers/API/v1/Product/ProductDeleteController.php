<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductDeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        Storage::disk('public')->delete($product->image_path);

        $product->delete();

        return 'OK';
    }
}
