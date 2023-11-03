<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'code'    => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => 'Thông tin không hợp lệ',
            'errors'  => $this->formatErrorMessage($validator->errors()->getMessages()),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    private function formatErrorMessage($errors)
    {
        $messages = [];

        foreach ($errors as $key => $errorList) {
            $messages[$key] =  $errorList[0] ?? null;
        }

        return $messages;
    }
}
