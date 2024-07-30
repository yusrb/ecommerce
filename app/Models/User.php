<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'username',
        'fp',
        'email',
        'password',
        'alamat',
        'kabupaten',
        'no_telepon',
        'jenis_kelamin',
    ];

    // pesanan yang dapat dilakukan user dengan dua pesanan atau lebih
    public function pesanans():HasMany {
        return $this->hasMany(Transaction::class);
    }
   // Wishlist user
    public function Wishlists () {
        return $this->hasMany(Wishlist::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
}