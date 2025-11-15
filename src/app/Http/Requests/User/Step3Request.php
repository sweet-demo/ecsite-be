<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class Step3Request extends FormRequest
{
    public function rules(): array
    {
        return [
            'allergies' => 'array',
            'allergies.*' => 'exists:allergies,id',
        ];
    }

    public function messages(): array
    {
        return [
            'allergies.array' => 'アレルギーは配列で入力してください',
            'allergies.*.exists' => 'アレルギーは存在しません',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
