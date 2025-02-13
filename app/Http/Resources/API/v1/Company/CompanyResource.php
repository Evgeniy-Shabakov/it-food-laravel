<?php

namespace App\Http\Resources\API\v1\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'brand_title' => $this->brand_title,
            'tagline' => $this->tagline,
            'favicon_path' => $this->favicon_path,
            'favicon_url' => $this->favicon_url,
            'logo_path' => $this->logo_path,
            'logo_url' => $this->logo_url,
            'phone' => $this->phone,
            'open_time' => $this->open_time ? substr($this->open_time, 0, 5) : null,
            'close_time' => $this->close_time ? substr($this->close_time, 0, 5) : null,
            'about_us' => $this->about_us,
            'contacts' => $this->contacts,
            'updated_at' => $this->updated_at,
        ];
    }
}
