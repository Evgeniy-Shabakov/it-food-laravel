<?php

namespace App\Http\Resources\API\v1\Ingredient;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseIngredientResource extends JsonResource
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
            'is_in_stop_list' => $this->is_in_stop_list,
            'is_active' => $this->is_active,
            'can_delete' => $this->pivot->can_delete,
            'can_replace' => $this->pivot->can_replace,
            'replacements' =>
                IngredientReplacementResource::collection($this->baseIngredientsReplacements($this->pivot->product_id)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
