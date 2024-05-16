<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public function __invoke(Request $request, bool $allDevices = false)
    {
        if ($allDevices) {
            // Выход со всех устройств, обновляем remember_token
            Auth::logout();
        } else {
            // Выход только с текущего устройства, не обновляем remember_token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Удаление remember_token на стороне клиента
            $cookie = Cookie::forget(Auth::getRecallerName());
            return response('Logged out')->withCookie($cookie);
        }

        return response()->noContent();
    }
}
