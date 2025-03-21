<?php

namespace App\Http\Controllers\API\v1\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductDeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $deletedStatus = $product->delete();

        if ($deletedStatus) {
            Storage::disk('public')->delete($product->image_path);
        }

        return 'OK';
    }
}
