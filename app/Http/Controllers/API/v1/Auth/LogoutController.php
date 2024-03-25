<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->user()->tokens()->delete();

        return 'Токены удалены';
    }
}
