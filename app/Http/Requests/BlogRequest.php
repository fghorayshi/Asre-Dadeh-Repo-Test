<?php

namespace App\Http\Requests;

use App\Http\Resources\ResponseResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlogRequest extends FormRequest
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
            'title'             => 'required|string|max:255',
            'blog_category_id'  => 'required|integer',
            'slug'              => 'nullable|max:255|unique:blogs,slug,' . $this->id . ',id',
            'status'            => 'required|integer',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ResponseResource::error('Validation errors',$validator->errors(),401)
        );
    }
}
