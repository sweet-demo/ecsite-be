<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class Step1Request extends FormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'tel1' => 'required|max:255',
            'tel2' => 'required|max:255',
            'tel3' => 'required|max:255',
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => '名前は必須です',
            'first_name.string' => '名前は文字列で入力してください',
            'first_name.max' => '名前は255文字以内で入力してください',
            'last_name.required' => '姓は必須です',
            'last_name.string' => '姓は文字列で入力してください',
            'last_name.max' => '姓は255文字以内で入力してください',
            'birthdate.required' => '生年月日は必須です',
            'birthdate.date' => '生年月日は日付で入力してください',
            'tel1.required' => '電話番号は必須です',
            'tel1.max' => '電話番号は255文字以内で入力してください',
            'tel2.required' => '電話番号は必須です',
            'tel2.max' => '電話番号は255文字以内で入力してください',
            'tel3.required' => '電話番号は必須です',
            'tel3.max' => '電話番号は255文字以内で入力してください',
        ];
    }
}
