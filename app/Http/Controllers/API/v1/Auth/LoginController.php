<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'sms_code' => 'required'
        ]);

        $phoneNumber = session('phone');
        $storedCode = session('sms_code');

        if($data['phone'] == $phoneNumber && $data['sms_code'] == $storedCode){
            $dataUser['phone'] = $phoneNumber;
            $user = User::firstOrCreate(['phone' => $dataUser['phone']], $dataUser);

            Auth::login($user, true);

            session()->forget(['sms_code', 'phone']);
            $request->session()->regenerate();
            return response(new UserResource($request->user()), Response::HTTP_CREATED);
        }

        return response([
            'message' => 'Данные не совпадают'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
