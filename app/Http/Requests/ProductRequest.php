<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product');

        return [
             'name' => ['required', 'min:3', 'max:255'],
             'harga' => ["required","min:3","max:255"] ,
             'stock' => ["required","min:1","max:255"],
             'deskripsi' => ["required","min:3", 'string'],
             'kategori_id' => ['required'],
             'gambars' => ['array','required'],
             'gambars.*' => ['file', 'mimes:jpg,jpeg,png', 'max:5120'],
        ];
    }
}