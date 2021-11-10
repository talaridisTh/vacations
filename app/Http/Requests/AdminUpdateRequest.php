<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\Concerns\Has;
use phpDocumentor\Reflection\Types\This;

class AdminUpdateRequest extends FormRequest {

    public function rules(): array
    {

        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ];

    }

    public function update($user)
    {

        $user = User::whereSlug($user)
            ->first()
            ->update([
                "created_by" => auth()->id(),
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'role' => $this->role,
            ]);
        if ($this->password) {
            $user->update(["password" => Hash::make($this->password)]);
        }

    }

    public function authorize(): bool
    {
        return true;
    }

}