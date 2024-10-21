<?php

namespace App\Http\Controllers\API\v1\LegalDocument;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\LegalDocument\LegalDocumentUpdateRequest;
use App\Http\Resources\API\v1\LegalDocument\LegalDocumentResource;
use App\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;

class LegalDocumentUpdateController extends Controller
{
    public function __invoke(LegalDocumentUpdateRequest $request, LegalDocument $legalDocument)
    {
        $data = $request->validated();

        if (isset($data['file'])) {
            $file = $data['file'];
            unset($data['file']);

            Storage::disk('public')->delete($legalDocument->file_path);

            $fileName = $data['title'] .'.'. $file->getClientOriginalExtension();
            $filePath = Storage::disk('public')->putFileAs('/legal-documents', $file, $fileName);
            $fileUrl = url('/storage/' . $filePath) . '?v=' . time();

            $data['file_path'] = $filePath;
            $data['file_url'] = $fileUrl;
        }

        if ($data['description'] == 'null') $data['description'] = '';

        $legalDocument->update($data);

        return new LegalDocumentResource($legalDocument);
    }
}
