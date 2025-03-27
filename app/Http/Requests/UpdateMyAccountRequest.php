<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMyAccountRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|min:6|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id)],
            'state_id' => 'required|exists:states,id',
        ];
    }
}
