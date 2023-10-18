<?php

namespace App\Http\Controllers\API\v1\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Company\UpdateRequest;
use App\Http\Resources\API\v1\Company\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        $faviconFile = $data['favicon_file'];
        $logoFile = $data['logo_file'];
        unset($data['favicon_file']);
        unset($data['logo_file']);

        Storage::disk('public')->delete($company->favicon_path);
        Storage::disk('public')->delete($company->logo_path);

        $faviconFileName = 'favicon.' . $faviconFile->getClientOriginalExtension();
        $faviconFilePath = Storage::disk('public')->putFileAs('/images', $faviconFile, $faviconFileName);
        $faviconFileUrl = url('/storage/' . $faviconFilePath);

        $logoFileName = 'logo.' . $logoFile->getClientOriginalExtension();
        $logoFilePath = Storage::disk('public')->putFileAs('/images', $logoFile, $logoFileName);
        $logoFileUrl = url('/storage/' . $logoFilePath);

        $data['favicon_path'] = $faviconFilePath;
        $data['favicon_url'] = $faviconFileUrl;
        $data['logo_path'] = $logoFilePath;
        $data['logo_url'] = $logoFileUrl;

        $company->update($data);

        return new CompanyResource($company);
    }
}
