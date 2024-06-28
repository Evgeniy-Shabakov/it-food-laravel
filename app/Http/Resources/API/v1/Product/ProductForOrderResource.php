<?php

namespace App\Http\Resources\API\v1\Product;

use App\Http\Resources\API\v1\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductForOrderResource extends ProductResource
{
    public function toArray($request): array
    {
        return array_merge(parent::toArray($request), [
            'quantity' => $this->pivot->quantity,
            'price' => $this->pivot->price,
        ]);
    }
}
