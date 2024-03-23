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

        $code = 4568;

        $data['phone'] = '+'.$data['phone'];
        $data['password'] = $code;

        User::firstOrCreate(['phone' => $data['phone']], $data);

        return $code;
    }
}
