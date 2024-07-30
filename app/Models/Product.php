<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name', 'harga', 'stock', 'deskripsi', 'kategori_id','warna' , 'stock'
    ];

    public function pictures()
    {
        return $this->hasMany(pic_product::class, 'product_id');
    }

    public function detailTransaction(): BelongsTo
    {
        return $this->belongsTo(DetailTransaction::class);
    }
}