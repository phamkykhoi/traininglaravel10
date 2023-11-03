<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        try {
            $user = Auth::user();
            $user->tokens()->delete();
            return $this->success();
        } catch (\Exception $e) {
            report($e);
            return $this->error($e->getMessage());
        }
    }
}
