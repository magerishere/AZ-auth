<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\Seller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        try {
            // bcrypt password
            $request['password'] = bcrypt($request->get('password'));
            // detect which user must be created
            $user = $request->get('seller') ? new Seller() : new User();
            // create user
            $user = $user::create($request->all());
            // session generate
            $request->session()->regenerate();
            // check which guard must be passed for authenticate
            $guard = $request->get('seller') ? 'seller' : 'web';
            // login user
            Auth::guard($guard)->loginUsingId($user->id);
            // success response
            return response()->json(['redirect' => route('dashboard')]);

        } catch (Exception $e) {
            // error response
            return response()->json(['message' => $e->getMessage()]);
        }

    }

    public function login(AuthLoginRequest $request)
    {
        try {
            // get only email and password
            $credentials = $request->only('email','password');
            // which guard must be passed
            $guard = $request->get('seller') ? 'seller' : 'web';
            // authenticate fails
            if(!Auth::guard($guard)->attempt($credentials)) {
                return response()->json(['message' => 'Email or password wrong!'],401);
            }
            // authenticate success
            return response()->json(['redirect' => route('dashboard')]);
        } catch (Exception $e) {
            // any error
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json(['redirect' => route('login.index')]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


}
