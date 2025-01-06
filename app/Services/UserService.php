<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
        //
    }
    public function registerUser($userDTO){
        
    }
    public function login($email){

    }
    public function findUser($data){

    }
    public function verifyEmail($token){

    }
    public function logout($data){

    }
}
