<?php

namespace App\Http\Resources\API\v1\Order;

use App\Http\Resources\API\v1\Address\AddressResource;
use App\Http\Resources\API\v1\City\CityResource;
use App\Http\Resources\API\v1\Employee\EmployeeResource;
use App\Http\Resources\API\v1\Restaurant\RestaurantResource;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'user' => UserResource::make($this->user),
            'city' => CityResource::make($this->city),
            'restaurant' => RestaurantResource::make($this->restaurant),
            'responsible_employee' => EmployeeResource::make($this->responsibleEmployee),
            'courier_employee' => EmployeeResource::make($this->coorierEmployee),
            'user_address' => AddressResource::make($this->userAddress),
            'order_type' => $this->order_type,
            'pack_takeaway' => $this->pack_takeaway,
            'total_price' => $this->total_price,
            'payment_type' => $this->payment_type,
            'banknote_for_change' => $this->banknote_for_change,
            'is_payment' => $this->is_payment,
            'comment' => $this->comment,
            'order_status' => $this->order_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
