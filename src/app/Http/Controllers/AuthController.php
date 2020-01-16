<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        $token = auth()->login($user);
        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function getUserInfo(){
        $authUser = Auth::user();
        $user = User::where('id', $authUser->id)->first();
        return response([
            'name' => $user->name,
            'email' => $user->email,
            'created' =>  $user->created_at
        ], 200);
    }

    public function changePassword(ChangePasswordRequest $request){
        $authUser = Auth::user();
        User::where('id', $authUser->id)->update(array('password' => Hash::make($request->password)));
        return response([], 204);
    }

    public function changeName(ChangeNameRequest $request){
        $authUser = Auth::user();
        User::where('id', $authUser->id)->update(array('name' => $request->name));
        return response([], 204);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
