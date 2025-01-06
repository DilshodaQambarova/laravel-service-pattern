<?php

namespace App\Interfaces\Services;

interface UserServiceInterface
{
    public function registerUser($userDTO);
    public function login($email);
    public function findUser($data);
    public function verifyEmail($token);
    public function logout($data);
}
