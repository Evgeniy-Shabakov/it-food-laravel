<?php

namespace App\Http\Controllers\API\v1\LegalDocument;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\LegalDocument\LegalDocumentStoreRequest;
use App\Http\Resources\API\v1\LegalDocument\LegalDocumentResource;
use App\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;

class LegalDocumentStoreController extends Controller
{
    public function __invoke(LegalDocumentStoreRequest $request)
    {
        $data = $request->validated();

        $file = $data['file'];
        unset($data['file']);

        $fileName = $data['title'] .'.'. $file->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs('/legal-documents', $file, $fileName);
        $fileUrl = url('/storage/' . $filePath) . '?v=' . time();

        $data['file_path'] = $filePath;
        $data['file_url'] = $fileUrl;

        $data['is_active'] = true; //этот парметр не используется, установлен на будущее

        $legalDocument = LegalDocument::create($data);

        return new LegalDocumentResource($legalDocument);
    }
}
