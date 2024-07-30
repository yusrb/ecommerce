<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pic_product extends Model
{
    protected $table = "pic_product";
    protected $primaryKey = "pic_product_id";
    protected $fillable = [
        "product_id",
        "picture"
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}