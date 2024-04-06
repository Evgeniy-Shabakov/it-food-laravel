<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
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

//        $data['phone'] = '+'.$data['phone'];

        if(Auth::attempt($data)) {
            $request->session()->regenerate();

            return response($request->user(), Response::HTTP_CREATED);
        }

        return response([
            'phone' => 'Данные не совпадают'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
