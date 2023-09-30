<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'title' => 'required|string|min:4|max:50',
            'description' => 'required|max:150',
            'body' => 'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The :attribute is required',
            'description.required' => 'The :attribute is required',
            'body.required' => 'The :attribute is required',
        ];
    }
}
