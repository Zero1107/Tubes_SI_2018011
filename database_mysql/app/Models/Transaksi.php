<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{

    protected $table = 'transaksi';

    public function data_pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    use HasFactory;
}
