<?php

namespace App\Http\Services\Classes;

use App\Http\Services\Interfaces\IAuthService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Guard;

class AuthService implements IAuthService
{

    public function login(array $data)
    {

        $user = User::where('email', $data['email'])
            ->where('user_type', $data['user_type'])
            ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid credentials');
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ];
    }

    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ];
    }

    public function logout()
    {
        /** @var Guard $guard */
        $guard = Auth::guard();
        $guard->user()->currentAccessToken()->delete();
    }
}
