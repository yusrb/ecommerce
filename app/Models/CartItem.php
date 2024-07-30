<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'harga',
        'color',
        'picture',
        'kuantitas',
        'stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}