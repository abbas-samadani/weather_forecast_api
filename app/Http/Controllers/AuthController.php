<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->authService = $authService;
    }


    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->validated());
        if (isset($token['error'])) {
            return response()->json($token, 401);
        }

        return $this->respondWithToken($token);
    }


    public function userProfile(): JsonResponse
    {
        return response()->json(auth('api')->user());
    }

    // Get the token array structure.
    protected function respondWithToken(string $token): JsonResponse
    {
        return ResponseHelper::tokenResponse($token);
    }
}
