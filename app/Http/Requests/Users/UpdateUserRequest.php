<?php

namespace App\Http\Requests\Users;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('admin_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'min:3', 'max:255'],
            'email' => ['nullable', 'email', "unique:users,email,{$this->user->id},id"],
            'password' => ['nullable', 'min:3', 'max:10']
        ];
    }
}
