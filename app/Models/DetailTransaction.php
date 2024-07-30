<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaction extends Model
{

    public function Detail_Transaction() :BelongsTo {        return $this->belongsTo(Transaction::class);
    }
}
