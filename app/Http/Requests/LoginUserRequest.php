<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ];
    }
    public function messages(): array{
        return [
            'email.required'=>'ko được để trống email',
            'email.email'=>'email ko đúng định dạng',
            'password.required'=>'pass ko được để trống',
            'password.string'=>'pass phải là chuỗi',
            'password.min'=>'pass tối thiểu 8 ký tự',
        ];
    }
}
