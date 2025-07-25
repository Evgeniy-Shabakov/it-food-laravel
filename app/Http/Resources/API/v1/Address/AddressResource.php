<?php

namespace App\Http\Resources\API\v1\Address;

use App\Http\Resources\API\v1\City\CityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'apartment_number' => $this->apartment_number,
            'entrance_number' => $this->entrance_number,
            'floor' => $this->floor,
            'entrance_code' => $this->entrance_code,
            'comment' => $this->comment,
            'show_to_user' => $this->show_to_user,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'value_string' => $this->value_string,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
