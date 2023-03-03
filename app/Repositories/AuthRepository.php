<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthRepository implements AuthInterface
{
    public function register(array $data): User
    {
        $fields = validator($data, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ])->validate();
    
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
    
        $token = $user->createToken('myapptoken')->accessToken;
    
        return $user;
    }
    

    public function login(array $credentials): array
    {
        $credentials = validator($credentials, [
            'email' => 'required|string',
            'password' => 'required|string'
        ])->validate();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('myapptoken')->accessToken;

            return [
                'user' => $user,
                'token' => $token
            ];
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid email or password',
        ]);
    }

    public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }
}
