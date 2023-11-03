<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:2|max:60',
            'email' => ['required', 'email', 'max:120', Rule::unique('users')],
            'password' => 'required|min:6|max:15|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.min' => 'Họ và tên không nhỏ hơn 2 ký tự',
            'name.max' => 'Họ và tên không được vượt quá 60 ký tự',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 120 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 15 ký tự',
        ];
    }
}
