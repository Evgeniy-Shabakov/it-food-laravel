<?php

namespace App\Http\Controllers\API\v1\LegalDocument;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\LegalDocument\LegalDocumentResource;
use App\Models\LegalDocument;

class LegalDocumentShowController extends Controller
{
    public function __invoke(LegalDocument $legalDocument)
    {
        return new LegalDocumentResource($legalDocument);
    }
}
