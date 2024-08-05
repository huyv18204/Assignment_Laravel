<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Thay đổi theo yêu cầu của bạn
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là một chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'image.image' => 'Hình ảnh phải là một tập tin hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'content.required' => 'Nội dung là bắt buộc.',
            'description.string' => 'Mô tả phải là một chuỗi ký tự.',
            'description.max' => 'Mô tả không được vượt quá 255 ký tự.',
        ];
    }
}
