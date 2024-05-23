<?php

namespace App\Http\Resources\API\v1\User;

use App\Http\Resources\API\v1\Address\AddressResource;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'employee' => new EmployeeResource($this->employee),
            'addresses' => AddressResource::collection($this->addresses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
