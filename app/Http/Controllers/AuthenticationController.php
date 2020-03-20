<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

 //
    public function register (Request $request)
    {
        $validatedDate= $this->validate($request,[
             'name'     => 'required',
             'email'    => 'required',
             'password' => 'required'
         ]);

//
        $validatedDate['password'] = bcrypt ($request->password);
        $user = User::create ($validatedDate);
        $accessToken = $user->createToken ('authToken')->accessToken;

        return response (['user' => $user, 'accessToken' => $accessToken]);
    }

    public function login (Request $request)
    {
        $loginData=  $this->validate($request,[
            'email'    => 'required',
            'password' => 'required'
        ]);

        if ( !Auth::attempt ($loginData) ) {
            return response (['message' => 'Invalid Credentials']);
        }

        $accessToken = Auth::user ()->createToken ('authToken')->accessToken;

        return response (['user' => auth ()->user (), 'accessToken' => $accessToken]);
    }
}
