<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class DetailBarangKeluar extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'tbl_detail_barang_keluar';
    protected $primary_key = 'id_detail_barang_keluar';
    protected $fillable = ['jumlah','harga','total'];
    protected $foreign_key = ['barang_keluar_id','barang_id'];

    public function barangkeluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluar::class);
    }
    public function barang(): HasOne
    {
        return $this->hasOne(Barang::class);
    }
}
