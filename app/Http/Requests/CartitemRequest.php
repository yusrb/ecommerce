<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartitemRequest extends FormRequest
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
        'user_id' => ['required', 'integer', 'exists:users,user_id'],
        'product_id' => ['required', 'integer', 'exists:products,product_id'],
        'name' => ['required', 'string', 'max:255'],
        'harga' => ['required', 'integer', 'min:0'],
        'color' => ['nullable', 'string', 'max:255'],
        'picture' => ['nullable', 'string', 'url', 'max:255'],
        'kuantitas' => ['required', 'integer', 'min:1'],
        'stock' => ['required', 'integer', 'min:0'],
        ];
    }
}
