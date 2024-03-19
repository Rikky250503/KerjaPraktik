<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangMasuk extends Model
{
    use HasFactory,HasUuids;

    protected $table = "tbl_detail_barang_masuk";
    protected $primary_key = 'id_detail_barang_masuk';
    protected $fillable = ['jumlah','harga_satuan','total'];
    protected $foreign_key = ['barang_masuk_id','barang_id'];

    public function barangmasuk(): BelongsTo
    {
        return $this->belongsTo(Barangmasuk::class);
    }
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
