<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function Ramsey\Uuid\v1;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|same:password_confirm',
            //
        ];
    }
    public function messages():array {
        return [
            'name.required'=>'ko được để trống name',
            'name.string'=>'name  phải là chuỗi',
            'email.required'=>'ko được để trống email',
            'email.email'=>'email ko đúng định dạng',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'pass ko được để trống',
            'password.string'=>'pass phải là chuỗi',
            'password.min'=>'pass tối thiểu 8 ký tự',
            'password.same'=>'passconfirm ko giống password',
        ];
    }
}
