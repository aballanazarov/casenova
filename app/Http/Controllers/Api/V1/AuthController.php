<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginUserRequest;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Tag (
 *     name="Auth",
 *     description="API Endpoints of Projects"
 * )
 */
class AuthController extends Controller
{
    /**
     * @OA\Post (
     *      path = "/login",
     *      operationId = "authUser",
     *      tags = {"Auth"},
     *      summary = "User authorization",
     *      description = "Return User token",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *      ),
     *      @OA\Response (
     *          response = 401,
     *          description = "Unauthenticated",
     *      ),
     *      @OA\Response (
     *          response = 403,
     *          description = "Forbidden"
     *      )
     * )
     */
    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = auth()->user();
            return $user->createToken("auth-token")->plainTextToken;
        }
        return response("Login error", 500);
    }


    public function store(StoreUserRequest $request)
    {
        return UserResource::make(User::query()->create($request->validated()));
    }


    public function destroy(User $user)
    {
        return $user->tokens()->delete();
    }
}
