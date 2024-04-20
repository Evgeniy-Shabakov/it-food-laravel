<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GetAuthUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        if($user) return new UserResource($user);

        return null;
    }
}
