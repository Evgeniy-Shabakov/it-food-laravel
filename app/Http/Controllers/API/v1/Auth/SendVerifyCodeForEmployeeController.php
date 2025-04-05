<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SendVerifyCodeForEmployeeController extends Controller
{
   public function __invoke(Request $request)
   {
      $data = $request->validate(['phone' => 'required']);

      $user = User::where('phone', $data['phone'])->first();

      if (!$user || !$user->employee) {
         return response()->json(['message' => 'Пользователь не является сотрудником.'], 404);
      }

      $sms_code = rand(1000, 9999);

      session(['phone' => $data['phone'], 'sms_code' => $sms_code]);

      return $sms_code;
   }
}
