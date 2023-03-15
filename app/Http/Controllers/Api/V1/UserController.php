<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @OA\Tag (
 *     name="Users",
 *     description="API Endpoints of Projects",
 * )
 */

class UserController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/admin/users",
     *      operationId = "getUsers",
     *      tags = {"Users"},
     *      summary = "Get list of users",
     *      description = "Returns list of users",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UserCollection",
     *          )
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
    public function index(Request $request)
    {
        return UserCollection::make(User::all());
    }


    /**
     * @OA\Post (
     *      path = "/admin/users/create",
     *      operationId = "storeUser",
     *      tags = {"Users"},
     *      summary = "Create new User",
     *      description = "Return User data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/StoreUserRequest",
     *          ),
     *      ),
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
    public function store(StoreUserRequest $request)
    {
        return UserResource::make(User::query()->create($request->validated()));
    }


    public function destroy(int $id)
    {
        return User::destroy($id);
    }
}
