<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\Services\UserServiceInterface;

class AuthController extends Controller
{
    use ResponseTrait;
    public function __construct(protected UserServiceInterface $userService){

    }
    public function register(RegisterRequest $request){

        $userDTO = new UserDTO($request->name, $request->email, $request->password);
        $user = $this->userService->registerUser($userDTO);
        return $this->success(new UserResource($user), 'User created successfully', 201);
    }
    public function login(LoginRequest $request){
        $token = $this->userService->loginUser($request->all());
        return $this->success($token, 'User logged successfully');
    }
    public function findUser(Request $request){

    }
    public function verifyEmail(Request $request){

    }
    public function logout(Request $request){

    }
}
