<?php

namespace App\Services;

use App\DTO\UserDTO;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

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
    public function loginUser($email){
        
    }
    public function findUser($data){

    }
    public function verifyEmail($token){

    }
    public function logout($data){

    }
}
