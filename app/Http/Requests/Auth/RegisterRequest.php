<?php

namespace App\Http\Requests\Auth;

use App\Http\Resources\ResponseResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users',
            'user_type' => 'required',
            'mobile'    => ['required', 'max:11', 'unique:users', 'regex:/^09(1[0-9]|3[0-9]|2[0-9]|0[1-9]|9[0-9])-?[0-9]{3}-?[0-9]{4}$/'],
            'password'  => 'required|min:8|confirmed',
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ResponseResource::error('Validation errors',$validator->errors(),401)
        );
    }
}
