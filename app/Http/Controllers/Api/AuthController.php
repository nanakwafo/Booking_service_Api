<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register (Request $request)
    {
        $validatedDate = $request->validate ([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);
        $user = User::create ($validatedDate);
        $accessToken = $user->createToken ('authToken')->accessToken;

        return response (['user' => $user, 'accessToken' => $accessToken]);
    }

    public function login (Request $request)
    {
        $loginData = $request->validate ([
            'email'    => 'required',
            'password' => 'required'
        ]);
        if ( !auth ()->attempt ($loginData) ) {
            return response (['message' => 'Invalid Credentials']);
        }

        $accessToken = auth ()->user ()->createToken ('authToken')->accessToken;

        return response (['user' => auth ()->user (), 'accessToken' => $accessToken]);
    }
}
