<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoUpdateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter the todo title.',
            'title.max' => 'Todo title should not exceed 255 characters.',
            'description.required' => 'Please enter the todo description.',
        ];
    }
}
