<?php

namespace App\Http\Requests;

class UploadRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', 'mimes:jpg,png,gif,csv,xls,webp', 'max:3000']
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Vui lòng chọn file',
            'file.mimes' => 'File không đúng định dạng',
            'file.max' => 'File không được vượt quá 3MB',
        ];
    }
}
