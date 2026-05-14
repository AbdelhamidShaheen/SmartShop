<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\Interfaces\IAuthService;

class AuthController extends Controller
{
    public function __construct(public IAuthService $authService)
    {
        //
    }

    public function login(LoginRequest $request)
    {

        return $this->success($this->authService->login($request->validated()),"login successfully");
        //
    }



    public function register(RegisterRequest $request)
    {
        //
        return $this->success($this->authService->register($request->validated()),"register successfully");
    }



    public function logout()
    {

        return $this->success($this->authService->logout(),"logout successfully");
        //
    }
    //
}
