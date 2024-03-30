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
            'title' => 'required|string|max:50|unique:books,title',
            'genre_id' =>'required|exists:genres,id',
            'author_id' =>'required|exists:author,id',
            'description' => 'required|string',
            'ISBN'=> 'required|string|unique:books,ISBN',
            'edition' =>'required|integer|max:4|min:4',
            'publicationDate' =>'required|date',
            'pagesNumber' => 'required|integer',
            'quantity' => 'required|integer',
            'language' => 'required|string|max:60',      
        ];
    }
}
