<?php

namespace App\Http\Resources\API\v1\Restaurant;

use App\Http\Resources\API\v1\City\CityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'city' => CityResource::make($this->city),
            'street' => $this->street,
            'house_number' => $this->house_number,
            'corps_number' => $this->corps_number,
            'office_number' => $this->office_number,
            'info' => $this->info,
            'delivery_available' => $this->delivery_available,
            'pickup_available' => $this->pickup_available,
            'eating_area_available' => $this->eating_area_available,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
