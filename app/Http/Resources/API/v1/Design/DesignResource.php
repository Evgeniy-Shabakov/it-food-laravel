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
            'background_page_main_color' => $this->background_page_main_color,
            'background_page_elements_color' => $this->background_page_elements_color,
            'brand_color' => $this->brand_color,
            'text_color_main' => $this->text_color,
            'text_color_on_brand_color' => $this->text_color_on_brand_color,
            'text_color_accent' => $this->accent_text_color,
            'bottom_nav_color' => $this->bottom_nav_color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
