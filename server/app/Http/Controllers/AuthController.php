<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
           'username' => 'required',
           'password' => 'required'
        ]);

        if ($validation->fails())
            return $this->validationErrorRes($validation->errors());

        $credentials = $validation->getData();

        if (!Auth::attempt($credentials)) {
            return $this->unauthRes('Incorrect username and/or password! Please check your credentials again.');
        }

        $user = Auth::user();

        $user->tokens()->delete();

        $token = $user->createToken('accessToken');

        return $this->successRes([
            'message' => 'Login success!',
            'token' => $token->plainTextToken,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token)
            return $this->unauthRes('Unauthenticated.');

        $token->delete();

        return $this->successRes([
           'message' => 'Logout success!'
        ]);
    }
}
