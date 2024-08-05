<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
{
    public function authorize()
    {
        // Cho phép tất cả người dùng thực hiện yêu cầu này, nếu bạn có logic phức tạp hơn,
        // bạn có thể thêm vào đây.
        return true;
    }

    public function rules()
    {
        // Các quy tắc xác thực cho việc tạo mới và cập nhật người dùng.
        // Bạn có thể tuỳ chỉnh lại các quy tắc này cho phù hợp với nhu cầu của bạn.
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:categories,email,' . $this->user,
            'password' => $this->isMethod('post') ? 'required|string|min:8' : 'nullable|string|min:8',
        ];
    }

    public function messages()
    {
        // Tùy chỉnh thông báo lỗi cho các quy tắc xác thực
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        ];
    }
}
