<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',    
            'genre_id' =>'required|exists:genres,id',
            'author_id' =>'required|exists:authors,id',
            'description' => 'required|string',
            'ISBN'=> 'required|string',
            'edition' => 'required|date_format:Y-m',
            'publicationDate' =>'required|date',
            'pagesNumber' => 'required|integer',
            'quantity' => 'required|integer',
            'language' => 'required|string|max:60',      
        ];
    }
}
