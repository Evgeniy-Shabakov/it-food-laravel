<?php

namespace App\Http\Resources\API\v1\Employee;

use App\Http\Resources\API\v1\Role\RoleResource;
use App\Http\Resources\API\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->user->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'surname' => $this->surname,
            'job' => $this->job,
            'roles' => RoleResource::collection($this->roles),
            'hasAdminPanelAccess' => $this->hasAdminPanelAccess(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
