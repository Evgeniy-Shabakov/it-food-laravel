<?php

namespace App\Http\Controllers\API\v1\Auth\VerifyCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendVerifyCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate(['phone' => 'required']);

        $sms_code = rand(1000, 9999);

        session(['phone' => $data['phone'],'sms_code' => $sms_code]);

        return $sms_code;
    }
}
