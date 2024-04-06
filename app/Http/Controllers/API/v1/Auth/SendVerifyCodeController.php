<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SendVerifyCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate(['phone' => 'required']);

        $code = rand(1000, 9999);

        $data['password'] = $code;

        $user = User::firstOrCreate(['phone' => $data['phone']], $data);
        $user->update($data);

        return $code;
    }
}
