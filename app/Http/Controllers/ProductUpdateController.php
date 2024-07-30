<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\pic_product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductUpdateController extends Controller
{
    public function show($product_id) {
        $product = Product::with('pictures')->findOrFail($product_id);

        return view('administrator.product-edit', [
            "product" => $product
        ]);
    }

    public function update(ProductRequest $request, $product_id) {
        $product = Product::findOrFail($product_id);

        $product->update($request->validated());

        if ($request->hasFile('gambars')) {
            foreach ($product->pictures as $picture) {
                Storage::disk('public')->delete($picture->pic_product_id);
                $picture->delete();
            }

            foreach ($request->file('gambars') as $gambar) {
                $path = $gambar->store('gambars', 'public');
                pic_product::create([
                    'product_id' => $product->product_id,
                    'picture' => $path,
                ]);
            }
        }

        return redirect()->route('product-table')->with('success', 'Produk berhasil diperbarui');
    }
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route("product-table")->with("success","fasdjfslka");
    }
 }