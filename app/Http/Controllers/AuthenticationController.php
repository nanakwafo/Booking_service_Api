<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

 //
    public function register (RegistrationRequest $request)
    {
        $request['password'] = bcrypt ($request->password);
        $user = User::create ($request);
        $accessToken = $user->createToken ('authToken')->accessToken;

        return response (['user' => $user, 'accessToken' => $accessToken]);
    }

    public function login (LoginRequest $request)
    {
       

        if ( !Auth::attempt ($request) ) {
            return response (['message' => 'Invalid Credentials']);
        }

        $accessToken = Auth::user ()->createToken ('authToken')->accessToken;

        return response (['user' => auth ()->user (), 'accessToken' => $accessToken]);
    }
}
