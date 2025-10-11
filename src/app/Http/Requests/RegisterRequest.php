<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * リクエストの認可を決定
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * バリデーションメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'メールアドレスは必須です',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'password.required' => 'パスワードは必須です',
            'password.min' => 'パスワードは6文字以上で入力してください',
            'password.confirmed' => 'パスワードの確認が一致しません',
        ];
    }
}
