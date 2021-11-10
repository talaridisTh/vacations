<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class AdminCreateRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ];
    }

    public function store()
    {


        return User::create([
            "created_by" => auth()->id(),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            "slug" => (new User())->createSlug($this->firstname . " " . $this->lastname),
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

    }

    public function authorize(): bool
    {
        return true;
    }

}