<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data, true)) {
            $request->session()->regenerate();

            return response(new UserResource($request->user()), Response::HTTP_CREATED);
        }

        return response([
            'phone' => 'Данные не совпадают'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
