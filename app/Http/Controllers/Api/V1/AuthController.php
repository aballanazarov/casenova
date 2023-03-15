<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginUserRequest;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
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


    /**
     * @OA\Post (
     *      path = "/admin/logout",
     *      operationId = "logoutUser",
     *      tags = {"Auth"},
     *      summary = "User logout",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              @OA\Property (
     *                  property = "message",
     *                  type = "object",
     *                  ref = "#/components/schemas/BaseProperties/properties/property_message",
     *              ),
     *              example = {
     *                  "message": "Successfully logged out"
     *              }
     *          )
     *      ),
     *      @OA\Response (
     *          response = 401,
     *          description = "Unauthenticated",
     *          @OA\JsonContent (
     *              ref="#/components/schemas/ResponseProperties/properties/unauthenticated",
     *          )
     *      ),
     *      @OA\Response (
     *          response = 403,
     *          description = "Forbidden",
     *          @OA\JsonContent (
     *              ref="#/components/schemas/ResponseProperties/properties/forbidden",
     *          )
     *      )
     * )
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return [
            'message' => trans('auth.logout'),
        ];
    }
}
