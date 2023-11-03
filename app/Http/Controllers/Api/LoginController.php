<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt($request->only(['email', 'password']))) {
                $user = Auth::user();

                $user->tokens()->delete();

                return $this->success([
                    'user' => $user,
                    'access_token' => $user->createToken('api-token')->plainTextToken,
                ]);
            }

            return $this->error('Đăng nhập thất bại', 401);

        } catch (\Exception $e) {
            report($e);
            return $this->error($e->getMessage());
        }
    }
}
