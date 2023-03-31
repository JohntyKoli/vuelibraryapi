<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public $validator = null;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'title' => 'string|max:255',
                'author' => 'string|max:255',
                'genre' => 'string|max:255',
                'description' => 'string|max:255',
                'isbn' => 'max:255',
                'image' => 'string|max:255',
                'publisher' => 'string|max:255',
                'published' => 'date',
            ];
        }
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'isbn' => 'required|max:255',
            'image' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published' => 'required|date',
        ];
    }


    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}