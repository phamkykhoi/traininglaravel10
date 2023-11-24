<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ProductRequest extends BaseRequest
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
            'name' => 'required|min:2|max:192',
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'string'],
            'category_id' => ['nullable', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.min' => 'Tên sản phẩm không nhỏ hơn 2 ký tự',
            'name.max' => 'Tên sản phẩm không được vượt quá 192 ký tự',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'price.numeric' => 'Giá sản phẩm phải là định dạng số',
            'category_id.numeric' => 'ID danh mục không đúng định dạng'
        ];
    }
}
