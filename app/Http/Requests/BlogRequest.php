<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'min:10',
                Rule::unique('blogs', 'title'),
            ],
            'content' => [
                'required',
                'string',
                'min:50',
            ],
            'category' => [
                'required',
                'string',
                Rule::in(['personal', 'story', 'society']),
            ],
        ];
     
    }

   public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.min' => 'Tiêu đề phải ít nhất 10 ký tự.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'content.required' => 'Nội dung là bắt buộc.',
            'content.min' => 'Nội dung phải ít nhất 50 ký tự.',
            'category.required' => 'Thể loại là bắt buộc.',
            'category.in' => 'Thể loại không hợp lệ.',
        ];
    }}