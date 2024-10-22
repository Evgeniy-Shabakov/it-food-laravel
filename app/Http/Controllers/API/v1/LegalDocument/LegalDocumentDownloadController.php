<?php

namespace App\Http\Controllers\API\v1\LegalDocument;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\LegalDocument\LegalDocumentResource;
use App\Models\LegalDocument;

class LegalDocumentDownloadController extends Controller
{
    public function __invoke(LegalDocument $legalDocument)
    {
        return response()->download(storage_path('app/public/' . $legalDocument->file_path));
    }
}
