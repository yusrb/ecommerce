<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->get();

        foreach ($wishlistItems as $item) {
            if ($item->product->pictures->isNotEmpty()) {
                $item->product->picture = asset('storage/' . $item->product->pictures->first()->picture);
            } else {
                $item->product->picture = '';
            }
        }

        return view('user.wishlist', compact('wishlistItems'));
    }


    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,product_id',
    ]);

    if (!Auth::check()) {
        return redirect()->route('login')->with(['login' => 'Anda harus login untuk menambahkan ke wishlist']);
    }

    $user_id = Auth::id();
    $product_id = $request->product_id;

    $wishlistsdhada = Wishlist::where('user_id', $user_id)
        ->where('product_id', $product_id)
        ->first();

    if ($wishlistsdhada) {
        return redirect()->back()->with('error', 'Product Sudah ada di Wishlist');
    }

    Wishlist::create([
        'user_id' => $user_id,
        'product_id' => $product_id,
    ]);

    return redirect()->back()->with('success', 'Product added to wishlist');
}

public function destroy($id)
{
    $wishlistItem = Wishlist::where('wishlist_id', $id)->firstOrFail();
    $wishlistItem->delete();

    return redirect()->back()->with('success', 'Product removed from wishlist');
}
}