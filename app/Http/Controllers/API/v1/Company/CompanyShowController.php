<?php

namespace App\Http\Controllers\API\v1\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Company\CompanyResource;
use App\Models\Company;


class CompanyShowController extends Controller
{
    public function __invoke(Company $company)
    {
        return new CompanyResource($company);
    }
}
