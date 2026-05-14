<?php

namespace App\Http\Services\Interfaces;

interface IAuthService
{
    public function login(array $data);

    public function register(array $data);

    public function logout();
}
