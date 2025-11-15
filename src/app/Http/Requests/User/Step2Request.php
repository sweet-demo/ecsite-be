<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class Step2Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'zip_code' => 'required|string|max:255',
            'prefecture' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'street' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'zip_code.required' => '郵便番号は必須です',
            'zip_code.string' => '郵便番号は文字列で入力してください',
            'zip_code.max' => '郵便番号は255文字以内で入力してください',
            'prefecture.required' => '都道府県は必須です',
            'prefecture.string' => '都道府県は文字列で入力してください',
            'prefecture.max' => '都道府県は255文字以内で入力してください',
            'municipality.required' => '市区群は必須です',
            'municipality.string' => '市区群は文字列で入力してください',
            'municipality.max' => '市区群は255文字以内で入力してください',
            'town.required' => '町村は必須です',
            'town.string' => '町村は文字列で入力してください',
            'town.max' => '町村は255文字以内で入力してください',
            'street.required' => '番地以降は必須です',
            'street.string' => '番地以降は文字列で入力してください',
            'street.max' => '番地以降は255文字以内で入力してください',
        ];
    }
}
