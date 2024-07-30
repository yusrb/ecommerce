<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\gambars;
use App\Models\pic_product;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Pest\Plugins\Only;

class ProductAddController extends Controller
{
    public function index() {
        return view("administrator/product-add");
    }

    public function store(ProductRequest $request) {
        $product = Product::create($request->validated());

        foreach ($request->file("gambars") as $gambar) {
            $path = $gambar->store('gambars','public');
            pic_product::create([
                'product_id' => $product->product_id,
                'picture' => $path,
            ]);
        }

        return redirect()->route('product-table');
    }
}