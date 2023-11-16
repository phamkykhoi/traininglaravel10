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
        $inputs = request()->all();

        if (!empty($inputs['name'])) {
            $query->where('name', 'like', '%'. $inputs['name'] .'%');
        }

        $userPaginated = $query->orderBy('id', 'desc')->where('parent_id', auth()->id())->paginate();

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
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            return $this->success();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $inputs = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
            ];

            if ($request->password) {
                $inputs['password'] = bcrypt($request->password);
            }

            User::find($id)->update($inputs);

            return $this->success();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
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
