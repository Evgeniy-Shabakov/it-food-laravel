<?php

namespace App\Http\Resources\API\v1\Design;

use App\Http\Resources\API\v1\Country\CountryResource;
use App\Http\Resources\API\v1\Restaurant\RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DesignResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'is_active' => $this->is_active,
            'background_color' => $this->background_color,
            'text_color' => $this->text_color,
            'brand_color' => $this->brand_color,
            'text_color_on_brand_color' => $this->text_color_on_brand_color,
            'supporting_color' => $this->supporting_color,
            'accent_text_color' => $this->accent_text_color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
