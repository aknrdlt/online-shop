<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Post(
 *   path="/api/register",
 *   summary="Sign up",
 *   description="Register by name, email, password",
 *   operationId="authRegister",
 *   tags={"auth"},
 *  @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"name", "email", "password"},
 *       @OA\Property(property="name", type="string", format="name", example="Alex"),
 *       @OA\Property(property="email", type="string", format="email", example="user@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="password12345"),
 *    ),
 * ),
 *      @OA\Response(
 *          response=201,
 *          description="Register Successfully",
 *          @OA\JsonContent()
 *       ),
 *      @OA\Response(
 *          response=200,
 *          description="Register Successfully",
 *          @OA\JsonContent()
 *       ),
 *      @OA\Response(
 *          response=422,
 *          description="Unprocessable Entity",
 *          @OA\JsonContent()
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 * )
 */
class RegisterController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        // TODO: Implement __invoke() method.
        try {
            //Validate request
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
