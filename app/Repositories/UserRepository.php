<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($data){
        return User::create($data);
    }
    public function findUser($data){

    }
}
