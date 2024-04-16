<?php

namespace App\Http\Resources\API\v1\City;

use App\Http\Resources\API\v1\Country\CountryResource;
use App\Http\Resources\API\v1\Restaurant\RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'country' => CountryResource::make($this->country),
            'restaurants' => RestaurantResource::collection($this->whenLoaded('restaurants')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
