<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $data['phone'] = '+'.$data['phone'];

        if(Auth::attempt($data)) {
            $user = Auth::user();

            foreach ($user->roles as $role) {
                $abilities[] = $role->title;
            }
            $abilities[] = 'client';
            
            return $user->createToken('iPhone X', $abilities)->plainTextToken;
        }

        return 'Пользователь не аутентифицирован';
    }
}
