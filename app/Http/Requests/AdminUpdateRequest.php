<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Testing\Concerns\Has;
use phpDocumentor\Reflection\Types\This;

class AdminUpdateRequest extends FormRequest {

    /**
     * @return string[]
     */
    public function rules(): array
    {

        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore(User::where("email", $this->email)->first()->id)],
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ];

    }

    /**
     * @param $user
     */
    public function update($user)
    {
        $user = tap(User::whereSlug($user)
            ->first())
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