<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(string $email, string $password)
    {
        return (new User())->create([
            "email" => $email,
            "password" => Hash::make($password),
        ]);
    }

    public function getUserByEmail(string $email)
    {
        return User::query()
            ->where("email", "=", $email)
            ->first();
    }
}
