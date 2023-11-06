<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $query = User::query();
        $userPaginated = $query->orderBy('id', 'desc')->where('parent_id', auth()->id())->paginate(10);

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
        try {
            User::create($request->all());
            return $this->success();
        } catch (\Exception $e) {
            return $this->exceptionMessage($e);
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            User::find($id)->update($request->all());
            return $this->success();
        } catch (\Exception $e) {
            return $this->exceptionMessage($e);
        }
    }

    public function show($id)
    {
        return $this->success([
            'user' => User::find($id)
        ]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return $this->success();
    }
}
