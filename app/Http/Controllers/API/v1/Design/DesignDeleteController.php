<?php

namespace App\Http\Controllers\API\v1\Design;

use App\Http\Controllers\Controller;
use App\Models\Design;

class DesignDeleteController extends Controller
{
    public function __invoke(Design $design)
    {
        $design->delete();

        return 'OK';
    }
}
