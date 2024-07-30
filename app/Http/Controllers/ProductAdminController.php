<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{

    public function showAdmin() {
        $product = DB::table("products")->oldest("product_id")->get();
        return view("administrator/product" , [
            "product"=> $product,
        ]);
    }

    public function store(ProductRequest $request) {
        $validateData = $request->validated();

     $product = new Product();
     $product->name = $validateData["name"];
     $product->harga = $validateData["harga"];
     $product->stock = $validateData["stock"];
     $product->deskripsi = $validateData["deskripsi"];
     $product->save();

     return redirect()->route("product")->with("success","Produk berhasil ditambahkan");
    }
}