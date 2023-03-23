<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @OA\Tag (
 *     name = "Auth",
 *     description = "API Endpoints of Projects",
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
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/LoginUserRequest",
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *      ),
     *      @OA\Response (
     *          response = 400,
     *          ref = "#/components/responses/400",
     *      ),
     *      @OA\Response (
     *          response = 401,
     *          ref = "#/components/responses/401",
     *      ),
     *      @OA\Response (
     *          response = 403,
     *          ref = "#/components/responses/403",
     *      ),
     *      @OA\Response (
     *          response = 422,
     *          ref = "#/components/responses/422",
     *      ),
     *      @OA\Response (
     *          response = 500,
     *          ref = "#/components/responses/500",
     *      ),
     * )
     */
    public function login(LoginUserRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = auth()->user();
            return $user->createToken("auth-token")->plainTextToken;
        }

        return response(trans('auth.failed'), 401);
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
     *          response = 400,
     *          ref = "#/components/responses/400",
     *      ),
     *      @OA\Response (
     *          response = 401,
     *          ref = "#/components/responses/401",
     *      ),
     *      @OA\Response (
     *          response = 403,
     *          ref = "#/components/responses/403",
     *      ),
     *      @OA\Response (
     *          response = 422,
     *          ref = "#/components/responses/422",
     *      ),
     *      @OA\Response (
     *          response = 500,
     *          ref = "#/components/responses/500",
     *      ),
     * )
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        Session::flush();

        return [
            'message' => trans('auth.logout'),
        ];
    }
}
