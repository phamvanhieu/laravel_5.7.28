<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'fullname'=>'required',
            'email'=>'email|required',
            'password'=>'min:6|required',
            'repassword'=>'min:6|required',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'trường này không được bỏ trống',
            'email.email'=>'trường này không được bỏ trống và phải là email',
            'password.min'=> 'Mật khẩu phải từ 6 kí tự trở lên',
            'repassword.min'=> 'Trường này phải nhập giống với mật khẩu ở trên',
        ];
    }
}
