<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|max:1000",
            'body' => "required|min:10|max:10000",
            'image' => 'mimes:jpg,jpeg,png,gif'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề không vượt quá 1000 ký tự',
            'body.required' => 'Nội dung bài viết không được để trống',
            'body.min' => 'Nội dung bài viết tối thiểu 10 ký tự',
            'body.max' => 'Nội dung bài viết không vượt quá 10000 ký tự',
            'image.mimes' => 'Định dạng file ảnh không đúng'
        ];
    }
}
