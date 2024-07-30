<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $cart = [];

        foreach ($cartItems as $item) {
            $product = Product::with('pictures')->find($item->product_id);
            $cartItemsObj = CartItem::findOrFail($item->id);
            $picture = $product->pictures->first();
            $color = $cartItemsObj->color;
            $user = User::findOrFail($cartItemsObj->user_id);
            $name_user = $user ? $user->name : '';
            $email = $user->email ? $user->email : '';
            $alamat = $user->alamat ? $user->alamat : '';
            $username = $user->username ? $user->username : '';
            $phone = $user->no_telepon ? $user->no_telepon : '';
            $kabupaten = $user->kabupaten ? $user->kabupaten : '';

            $cart[] = [
                'product_id' => $item->product_id,
                'name' => $product->name,
                'email' => $email,
                'alamat' => $alamat,
                'username' => $username,
                'phone' => $phone,
                'kabupaten' => $kabupaten,
                'name_user' => $name_user,
                'harga' => $product->harga,
                'kuantitas' => $cartItemsObj->kuantitas,
                'picture' => $picture ? asset('storage/' . $picture->picture) : null,
                'stock' => $product->stock,
                'color' => $color,
            ];
        }

        return view('user.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'kabupaten' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'paymentMethod' => 'required|string',
            'cardNumber' => 'nullable|required_if:paymentMethod,credit_card|string|max:20',
            'expiryDate' => 'nullable|required_if:paymentMethod,credit_card|string|max:5',
            'cvc' => 'nullable|required_if:paymentMethod,credit_card|string|max:4',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja kosong.');
        }

        $user = Auth::user();

        try {
            DB::transaction(function () use ($cart, $user, $validatedData) {
                // Periksa stok produk sebelum melanjutkan transaksi
                foreach ($cart as $item) {
                    $product = Product::findOrFail($item['product_id']);
                    if ($product->stock < $item['kuantitas']) {
                        throw new \Exception('Stok produk tidak mencukupi untuk produk ' . $product->name);
                    }
                }

                $transaction = $this->createTransaction($cart, $user);
                $this->createTransactionItems($transaction, $cart);

                // Kurangi stok produk setelah transaksi berhasil
                foreach ($cart as $item) {
                    $product = Product::findOrFail($item['product_id']);
                    $product->stock -= $item['kuantitas'];
                    $product->save();
                }

                session()->forget('cart');
            });

            $message = "Pesanan baru:\n\nNama: {$validatedData['name']}\nEmail: {$validatedData['email']}\nTelepon: {$validatedData['phone']}\nKabupaten: {$validatedData['kabupaten']}\nAlamat: {$validatedData['address']}\nMetode Pembayaran: {$validatedData['paymentMethod']}";
            $phoneNumber = '62895709886060'; // Ganti dengan nomor WhatsApp tujuan
            $whatsappURL = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);

            return redirect($whatsappURL);
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Terjadi kesalahan saat memproses transaksi: ' . $e->getMessage());
        }
    }

    private function createTransaction($cart, $user)
    {
        return Transaction::create([
            'user_id' => $user->id,
            'total_amount' => $this->calculateTotal($cart)
        ]);
    }

    private function createTransactionItems($transaction, $cart)
    {
        foreach ($cart as $item) {
            $transaction->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['kuantitas'],
                'price' => $item['harga']
            ]);
        }
    }

    private function calculateTotal($cart)
    {
        $subtotal = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['harga'] * $item['kuantitas']);
        }, 0);

        $shipping = 50000;
        $shippingCost = $subtotal > 500000 ? 0 : $shipping;

        return $subtotal + $shippingCost;
    }
}