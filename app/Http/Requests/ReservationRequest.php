<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
        $startDate = Carbon::parse($this->input('startDate'));
        $week = $startDate->addWeek();
        return [
            'startDate' => 'required|date|after:today',
            'returnDate' => 'required|date|after:startDate|before:'.$week,
            'message' => 'required|string',
            'book_id' => 'required|exists:books,id',
        ];
    }
}
