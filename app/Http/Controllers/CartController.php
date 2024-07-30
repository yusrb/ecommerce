<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartitemRequest;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
        public function showCart()
        {
            $cartItems = CartItem::where('user_id', Auth::id())->get();
            $cart = [];

            foreach ($cartItems as $item) {
                $product = Product::with('pictures')->find($item->product_id);
                $cartItemsObj = CartItem::findOrFail($item->id);
                $picture = $product->pictures->first();
                $color = $cartItemsObj->color;
                $cart[] = [
                    'product_id' => $item->product_id,
                    'name' => $product->name,
                    'harga' => $product->harga,
                    'kuantitas' => $cartItemsObj->kuantitas,
                    'picture' => $picture ? asset('storage/' . $picture->picture) : null,
                    'stock' => $product->stock,
                    'color' => $color,
                ];
            }

            return view('user.cart', compact('cart'));
        }

        public function remove(Request $request)
        {
            $request->validate([
                'product_id' => 'required|exists:cart_items,product_id,user_id,' . Auth::id()
            ]);

            $product_id = $request->input('product_id');
            CartItem::where('user_id', Auth::id())->where('product_id', $product_id)->delete();

            return redirect()->route('cart')->with('success', 'Item berhasil dihapus dari keranjang.');
        }

        public function add(Request $request)
        {
            $request->validate([
                'product_id' => 'required|exists:products,product_id',
                'kuantitas' => 'required|integer|min:1'
            ]);

            $product_id = $request->input('product_id');
            $kuantitas = $request->input('kuantitas');
            $userId = Auth::id();

            $product = Product::find($product_id);
            if (!$product) {
                return redirect()->route('cart')->with('alert', 'alert("Produk tidak ditemukan.")');
            }

            $cartItem = CartItem::where('user_id', $userId)->where('product_id', $product_id)->first();

            if ($cartItem) {
                if (($cartItem->kuantitas + $kuantitas) > $product->stock) {
                    return redirect()->route('cart')->with('success', 'Item berhasil dihapus dari keranjang.');
                }
                $cartItem->kuantitas += $kuantitas;
            } else {
                if ($kuantitas > $product->stock) {
                    return redirect()->route('cart')->with('error', 'Kuantitas produk melebihi stok yang tersedia.');
                }
                $cartItem = new CartItem();
                $cartItem->name = $product->name;
                $cartItem->picture = $product->pictures;
                $cartItem->harga = $product->harga;
                $cartItem->user_id = $userId;
                $cartItem->product_id = $product_id;
                $cartItem->stock = $product->stock;
                $cartItem->kuantitas = $kuantitas;
            }

            $cartItem->save();

            return redirect()->route('cart');
        }

        public function showCheckoutPage()
        {
            // Ambil data cart dari session
            $cart = session('checkout_cart', []);
            $erroralert = '';

            // Hitung total
            if ($cart !== null && is_array($cart) && count($cart) > 0) {
                $total = array_reduce($cart, function ($carry, $item) {
                    return $carry + ($item['harga'] * $item['kuantitas']);
                }, 0);
            } else {
                $total = 0;
                $erroralert = 'Keranjang belanja kosong atau tidak valid.';
            }

            return view('user/checkout', compact('cart', 'total', 'erroralert'));
        }

        public function updateQuantity(Request $request)
        {
            $user_id = auth()->id();

            if ($request->has('product_id')) {
                $product_id = $request->input('product_id');

                $cartItem = CartItem::where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->first();

                if (!$cartItem) {
                    return redirect()->route('cart')->with('error', 'Item tidak boleh melebihi dari stock.');
                }

                $product = Product::find($product_id);
                if ($cartItem->kuantitas + 1 > $product->stock) {
                    return redirect()->route('cart')->with('error', 'Item tidak boleh melebihi dari stock.');
                }

                $cartItem->kuantitas += 1;
                $cartItem->save();
                return redirect()->back()->with('success','');
            }
        }

        public function decreaseQuantity(Request $request)
        {
            $user_id = auth()->id();

            if ($request->has('product_id')) {
                $product_id = $request->input('product_id');

                $cartItem = CartItem::where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->first();

                if (!$cartItem) {
                    return redirect()->route('cart')->with('error', 'Item tidak boleh melebihi dari stock.');
                }

                if ($cartItem->kuantitas <= 1) {
                    return redirect()->route('cart')->with('error', 'Item tidak boleh kurang dari 1.');
                }

                $cartItem->kuantitas -= 1;
                $cartItem->save();
                return redirect()->back()->with('success','');
            }
        }

        public function checkout(Request $request)
        {
            $cart = $request->input('cart');
            session(['checkout_cart' => $cart]);

            // Redirect ke halaman checkout
            return redirect()->route('checkout.page');
        }
}