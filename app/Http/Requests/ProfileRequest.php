<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        $userId = $this->route('user_id');
        return [
            'name' => ['', 'string', 'max:255'],
            'username' => ['', 'string', 'max:255', Rule::unique('users')->ignore($userId, 'user_id')],
            'alamat' => ['', 'string'],
            'kabupaten' => ['', 'string'],
            'no_telepon' => ['', 'string', 'max:15', Rule::unique('users')->ignore($userId, 'user_id')],
            'jenis_kelamin' => ['', 'string', 'in:Laki-laki,Perempuan'],
            'fp' => ['nullable', 'image', 'max:1024']
        ];
    }
}