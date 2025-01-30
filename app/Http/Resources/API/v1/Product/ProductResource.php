<?php

namespace App\Http\Resources\API\v1\Product;

use App\Http\Resources\API\v1\Category\CategoryResource;
use App\Http\Resources\API\v1\Ingredient\AdditionalIngredientResource;
use App\Http\Resources\API\v1\Ingredient\BaseIngredientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_path' => $this->image_path,
            'image_url' => $this->image_url,
            'description_short' => $this->description_short,
            'description_full' => $this->description_full,
            'price_default' => $this->price_default,
            'is_active' => $this->is_active,
            'category' => CategoryResource::make($this->category),
            'base_ingredients' => BaseIngredientResource::collection($this->baseIngredients),
            'additional_ingredients' => AdditionalIngredientResource::collection($this->additionalIngredients),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
