<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartitemRequest;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index($kategori_id = null)
    {
        $products = Product::query();

        if ($kategori_id && $kategori_id !== 'semua_kategori') {
            $products->where('kategori_id', $kategori_id);
        }

        $products = $products->with('pictures')->paginate(12);

        return view("user.home", [
            "product" => $products
        ]);
    }

    public function iemview()
    {
        $iem = Product::where('kategori_id', 1)->paginate(8);

        return view('user/homekategori/iem', [
            'product' => $iem
        ]);
    }

    public function cableview()
    {
        $cable = Product::where('kategori_id', 2)->paginate(8);

        return view('user/homekategori/cable', [
            'product' => $cable
        ]);
    }

    public function eartipsview()
    {
        $eartips = Product::where('kategori_id', 3)->paginate(8);

        return view('user/homekategori/eartips', [
            'product' => $eartips
        ]);
    }

    public function boxview()
    {
        $box = Product::where('kategori_id', 4)->paginate(8);

        return view('user/homekategori/box', [
            'product' => $box
        ]);
    }

    public function SaveCart($product_id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('home')->with('alert','Login Terlebih Dahulu');
        }

        $product = Product::findOrFail($product_id);

        $cartItem = CartItem::where('user_id', $user->user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->kuantitas += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => $user->user_id,
                'product_id' => $product_id,
                'name' => $product->name,
                'harga' => $product->harga,
                'color' => 'white',
                'picture' => $product->pictures->first() ? 'storage/' . $product->pictures->first()->picture : null,
                'kuantitas' => 1,
                'stock' => $product->stock,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product berhasil ditambah ke cart');
    }
}