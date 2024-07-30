<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
public function authorize()
{
// Anda bisa mengatur otorisasi di sini
return true;
}

public function rules()
{
return [
'user_id' => 'required|exists:users,id',
'jumlah' => 'required|numeric',
'status' => 'required|string|in:belum lunas,lunas', // menyesuaikan status yang ada
'total_harga' => 'required|numeric',
'name' => 'required|string|max:255',
'no_telepon' => 'required|string|max:20',
'alamat' => 'required|string|max:255',
'catatan' => 'nullable|string|max:500',
];
}

public function messages()
{
return [
'user_id.required' => 'User ID harus diisi.',
'user_id.exists' => 'User ID tidak valid.',
'jumlah.required' => 'Jumlah harus diisi.',
'jumlah.numeric' => 'Jumlah harus berupa angka.',
'status.required' => 'Status harus diisi.',
'status.in' => 'Status tidak valid.',
'total_harga.required' => 'Total harga harus diisi.',
'total_harga.numeric' => 'Total harga harus berupa angka.',
'name.required' => 'Nama lengkap harus diisi.',
'no_telepon.required' => 'Nomor telepon harus diisi.',
'alamat.required' => 'Alamat harus diisi.',
];
}
}