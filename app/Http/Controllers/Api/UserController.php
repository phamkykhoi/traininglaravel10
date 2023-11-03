<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index()
    {
        $query = User::query();
        $userPaginated = $query->paginate();

        return $this->success([
            'users' => $userPaginated->items(),
            'meta' => [
                'total' => $userPaginated->total(),
                'per_page' => $userPaginated->perPage(),
                'current_page' => $userPaginated->currentPage(),
                'last_page' => $userPaginated->lastPage(),
                'from' => $userPaginated->firstItem(),
                'to' => $userPaginated->lastItem(),
            ],
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        
    }

    public function update(UserStoreRequest $request, $id)
    {

    }

    public function show($id)
    {
        return $this->success([
            'user' => User::find($id)
        ]);
    }
}
