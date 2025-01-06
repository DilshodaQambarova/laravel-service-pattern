<?php

namespace App\Repositories;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Support\Str;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($data){
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->verification_token = $data['verification_token'];
        $user->save();
        return $user;
    }
    public function getUserByEmail($email){
        return User::where('email', $email)->firstOrFail();
    }
}
