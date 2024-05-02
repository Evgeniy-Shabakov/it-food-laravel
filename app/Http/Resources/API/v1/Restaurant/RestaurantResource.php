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
            'pick_up_available' => $this->pick_up_available,
            'delivery_available' => $this->delivery_available,
            'pick_up_available_at_the_restaurant_counter' => $this->pick_up_available_at_the_restaurant_counter,
            'delivery_available_at_the_restaurant_to_the_table' => $this->delivery_available_at_the_restaurant_to_the_table,
            'pick_up_available_at_the_car_window' => $this->pick_up_available_at_the_car_window,
            'delivery_available_in_the_parking_to_car' => $this->delivery_available_in_the_parking_to_car,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
