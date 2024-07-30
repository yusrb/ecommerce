<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $kategoriName = $request->input('product_type');

        $kategoriIds = [
            'all_categories' => null,
            'In_Ear_Monitor' => 1,
            'Cable' => 2,
            'Eartips' => 3,
            'Box' => 4,
        ];

        $kategoriId = $kategoriIds[$kategoriName] ?? null;

        $products = Product::query();

        if ($kategoriId !== null) {
            $products->where('kategori_id', $kategoriId);
        }

        if ($search) {
            $products->where('name', 'like', "%{$search}%");
        }

        $products = $products->paginate(10);

        return view('user/search_result', compact('products', 'search'));
    }
}