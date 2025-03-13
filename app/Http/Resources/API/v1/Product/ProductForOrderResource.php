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
            'user_config_id' => $this->pivot->user_config_id,
            'user_config_base_ingredients' => json_decode($this->pivot->base_ingredients, true),
            'user_config_additional_ingredients' => json_decode($this->pivot->additional_ingredients, true),
        ]);
    }
}
