<?php

namespace App\Interfaces\Services;

use App\Traits\ResponseTrait;

interface UserServiceInterface
{
    public function registerUser($userDTO);
    public function loginUser($data);
    public function verifyEmail($token);
}
