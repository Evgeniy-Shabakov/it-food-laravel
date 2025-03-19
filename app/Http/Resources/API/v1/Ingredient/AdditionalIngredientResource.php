<?php

namespace App\Http\Resources\API\v1\Ingredient;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalIngredientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_path' => $this->image_path,
            'image_url' => $this->image_url,
            'description' => $this->description,
            'price_default' => $this->price_default,
            'stop_list' => $this->stop_list,
            'is_active' => $this->is_active,
            'max_quantity' => $this->pivot->max_quantity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
