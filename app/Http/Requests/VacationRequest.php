<?php

namespace App\Http\Requests;

use App\Models\Vacation;
use Illuminate\Foundation\Http\FormRequest;

class VacationRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'vacation_start' => 'required|date|after_or_equal:tomorrow',
            'vacation_end' => 'required|date|after:vacation_start',
            'reason' => 'required|string'
        ];
    }

    public function store()
    {
        $this->merge(["user_id" => auth()->id()]);
        Vacation::create($this->only("vacation_start","vacation_end","reason","user_id"));
    }

    public function authorize(): bool
    {
        return true;
    }

}