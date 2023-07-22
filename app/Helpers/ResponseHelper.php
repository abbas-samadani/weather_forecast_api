<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class ResponseHelper
{
    public static function unauthorizedResponse(): JsonResponse
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public static function tokenResponse(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
