<?php

namespace App\Http\Controllers\API\v1\LegalDocument;

use App\Http\Controllers\Controller;
use App\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;

class LegalDocumentDeleteController extends Controller
{
    public function __invoke(LegalDocument $legalDocument)
    {
        Storage::disk('public')->delete($legalDocument->file_path);

        $legalDocument->delete();

        return 'OK';
    }
}
