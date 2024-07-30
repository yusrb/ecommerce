<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest; // Import TransactionRequest
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
/**
* Handle the checkout process.
*/
public function endCheckout(TransactionRequest $request)
{
// Data yang divalidasi
$validatedData = $request->validated();

dd('Validation passed');

// Buat dan simpan transaksi baru
$transaction = Transaction::create([
'user_id' => Auth::id(),
'jumlah' => $validatedData['jumlah'],
'status' => 'belum lunas',
'total_harga' => $validatedData['total_harga'],
'name' => $validatedData['name'],
'no_telepon' => $validatedData['phone'],
'alamat' => $validatedData['alamat'],
'catatan' => $validatedData['catatan'] ?? null,
]);

dd($transaction);

return redirect()->route('checkout')->with('success', 'Checkout Berhasil dilakukan, silahkan tunggu');
}
}