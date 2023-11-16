<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserUpdateRequest extends BaseRequest
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
        $rules = [
            'name' => 'required|min:2|max:60',
            'email' => ['required', 'email', 'max:120', Rule::unique('users')->ignore($this->user)],
            'phone' => 'required|numeric',
            'address' => 'string|required|max:200',
            'gender' => 'required|in:1,2,3',
            'avatar' => ['nullable', 'string']
        ];

        if (request()->password) {
            $rules['password'] = 'min:6|max:15|confirmed';
            $rules['password_confirmation'] = 'required|min:6|max:15';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.min' => 'Họ và tên không nhỏ hơn 2 ký tự',
            'name.max' => 'Họ và tên không được vượt quá 60 ký tự',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email không được vượt quá 120 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'address.max' => 'Địa chỉ không được vượt quá 200 ký tự',
            'gender.required' => 'Vui lòng chọn giới tính',
            'gender.in' => 'Giá trị không hợp lệ',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 15 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
            'password_confirmation.min' => 'Mật khẩu nhập lại không được nhỏ hơn 6 ký tự',
            'password_confirmation.max' => 'Mật khẩu nhập lại không được lớn hơn 15 ký tự',
            'password.confirmed' => 'Mật khẩu không giống nhau',
            'avatar.mimes' => 'Vui lòng chọn file ảnh đúng định dạng',
            'avatar.max' => 'Ảnh đại diện không được vượt quá 2MB',
        ];
    }
}
