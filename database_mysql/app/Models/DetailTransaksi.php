<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{

    protected $table = 'detailtransaksi';

    public function data_transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }
    
    public function data_menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id');
    }

    use HasFactory;
}
