<?php

namespace App\Http\Controllers\API\v1\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        if ($category->products->count())
            return response('Небходимо сначала удалить товары привязанные к категории ', 403);

        $categories = Category::all();
        foreach ($categories as $item) {
            if($item['number_in_list'] > $category['number_in_list']) {
                $item['number_in_list'] = $item['number_in_list'] - 1;
                $item->update();
            }
        }

        $category->delete();
        return 'OK';
    }
}
