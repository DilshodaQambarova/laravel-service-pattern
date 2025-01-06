<?php

namespace App\Services;

use App\DTO\UserDTO;
use Illuminate\Support\Str;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    use ResponseTrait;

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
        //
    }
    public function registerUser($userDTO){
        $data = [
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
            'verification_token' => Str::random(20)
        ];
        return $this->userRepository->createUser($data);
    }
    public function loginUser($data){
        $user = $this->userRepository->getUserByEmail($data['email']);
        if(!$user || !Hash::check($data['password'], $user->password)){
            return $this->error('User not found or password is incorrect', 404);
        }
        return $user->createToken('login')->plainTextToken;

    }
    public function findUser($data){

    }
    public function verifyEmail($token){

    }
    public function logout($data){

    }
}
