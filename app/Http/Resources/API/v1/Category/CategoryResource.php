<?php

namespace App\Http\Resources\API\v1\Category;

use App\Http\Resources\API\v1\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'number_in_list' => $this->number_in_list,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
