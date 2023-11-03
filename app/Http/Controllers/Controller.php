<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function success($data = null, $statusCode = 200)
    {
        return response()->json([
            'status' => true,
            'code' => $statusCode,
            'message' => 'success',
            'data' => $data,
        ], $statusCode ?? HttpResponse::HTTP_OK);
    }

    protected function error($message, $statusCode = 500)
    {
        return response()->json([
            'status' => false,
            'code' => $statusCode,
            'message' => $message,
        ], $statusCode ?? HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function exceptionMessage(\Exception $e)
    {
        return config('app.env') != 'local' ? 'Lỗi hệ thống' : $e->getMessage();
    }
}
