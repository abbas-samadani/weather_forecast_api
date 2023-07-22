<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $credentials)
    {
        if (! $token = Auth::attempt($credentials)) {
            return ['error' => 'Unauthorized'];
        }

        return $token;
    }
}
