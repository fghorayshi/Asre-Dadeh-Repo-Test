<?php

namespace App\Http\Requests;

use App\Http\Resources\ResponseResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminUserRequest extends FormRequest
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
            'name'      => 'sometimes|required|string|max:255',
            'email'     => ['sometimes', 'required', 'email', 'unique:users,email,' . $this->id],
            'user_type' => ['sometimes', 'required', 'in:admin,user'],
            'mobile'    => ['sometimes', 'required', 'max:11', 'unique:users,mobile,' . $this->id, 'regex:/^09(1[0-9]|3[0-9]|2[0-9]|0[1-9]|9[0-9])-?[0-9]{3}-?[0-9]{4}$/'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ResponseResource::error('Validation errors', $validator->errors(), 401)
        );
    }
}
