<?php

namespace App\Http\Controllers\API\v1\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Company\CompanyUpdateRequest;
use App\Http\Resources\API\v1\Company\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyUpdateController extends Controller
{
    public function __invoke(CompanyUpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        if (isset($data['favicon_file'])) {
            $faviconFile = $data['favicon_file'];
            unset($data['favicon_file']);

            Storage::disk('public')->delete($company->favicon_path);

            $faviconFileName = 'favicon.' . $faviconFile->getClientOriginalExtension();
            $faviconFilePath = Storage::disk('public')->putFileAs('/images', $faviconFile, $faviconFileName);
            $faviconFileUrl = url('/storage/' . $faviconFilePath);

            $data['favicon_path'] = $faviconFilePath;
            $data['favicon_url'] = $faviconFileUrl;
        }

        if (isset($data['logo_file'])) {
            $logoFile = $data['logo_file'];
            unset($data['logo_file']);

            Storage::disk('public')->delete($company->logo_path);

            $logoFileName = 'logo.' . $logoFile->getClientOriginalExtension();
            $logoFilePath = Storage::disk('public')->putFileAs('/images', $logoFile, $logoFileName);
            $logoFileUrl = url('/storage/' . $logoFilePath);

            $data['logo_path'] = $logoFilePath;
            $data['logo_url'] = $logoFileUrl;
        }

        if ($data['tagline'] == 'null') $data['tagline'] = '';
        if ($data['about_us'] == 'null') $data['about_us'] = '';
        if ($data['contacts'] == 'null') $data['contacts'] = '';

        $company->update($data);

        return new CompanyResource($company);
    }
}
