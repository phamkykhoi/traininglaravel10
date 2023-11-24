<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::query();
        $inputs = request()->all();

        if (!empty($inputs['name'])) {
            $query->where('name', 'like', '%'. $inputs['name'] .'%');
        }

        $productPaginated = $query
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')->paginate(request()->per_page ?? 15);

        return $this->success([
            'products' => $productPaginated->items(),
            'meta' => [
                'total' => $productPaginated->total(),
                'per_page' => $productPaginated->perPage(),
                'current_page' => $productPaginated->currentPage(),
                'last_page' => $productPaginated->lastPage(),
                'from' => $productPaginated->firstItem(),
                'to' => $productPaginated->lastItem(),
            ],
        ]);
    }

    public function store(ProductRequest $request)
    {
        try {
            Product::create($request->all());

            return $this->success();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            Product::find($id)->update($request->all());

            return $this->success();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function show($id)
    {
        return $this->success([
            'product' => Product::find($id)
        ]);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return $this->success();
    }
}
