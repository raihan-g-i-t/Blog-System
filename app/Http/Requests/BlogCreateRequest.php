<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'required',
            'status' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Title is required',
            'image.required' => 'You did not provide an image',
            
        ];
    }
}
