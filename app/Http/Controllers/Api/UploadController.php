<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(UploadRequest $request)
    {
        try {
            $disk = 'local';
            $path = Storage::disk($disk)->put('media', $request->file);
            $path = Storage::disk($disk)->url($path);

            return $this->success([
                'file_url' => $path,
            ]);
        } catch (\Exception $e) {
            report($e);
            return $this->error($e->getMessage());
        }
    }
}
