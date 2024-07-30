<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
use HasFactory;

protected $table = 'transactions';
protected $primaryKey = 'transaction_id';
protected $fillable = [
    'user_id',
    'jumlah',
    'status',
    'total_harga',
    'name',
    'no_telepon',
    'alamat',
    'catatan',
];

public function user()
{
return $this->belongsTo(User::class, 'user_id');
}
}