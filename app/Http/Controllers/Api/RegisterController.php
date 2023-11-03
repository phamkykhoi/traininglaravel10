<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $inputs = $request->validated();
            $inputs['password'] = bcrypt($inputs['password']);

            $user = User::create($inputs);

            if (Auth::attempt($request->only(['email', 'password']))) {
                $user = Auth::user();

                $user->tokens()->delete();

                return $this->success([
                    'user' => $user,
                    'access_token' => $user->createToken('api-token')->plainTextToken,
                ]);
            }

            return $this->error('Đăng ký thất bại', 500);

        } catch (\Exception $e) {
            report($e);
            return $this->error($e->getMessage());
        }
    }
}
