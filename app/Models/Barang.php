<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Barang extends Model
{
    use HasFactory, HasUuids;

    protected $table = "tbl_barang";
    protected $primary_key = 'id_barang';
    protected $fillable = ['nama_barang','jumlah','harga'];
    protected $foreign_key = 'id_kategori';

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function detailbarangkeluar(): HasOne
    {
        return $this->hasOne(DetailBarangKeluar::class);
    }
    public function detailbarangmasuk(): HasOne
    {
        return $this->hasOne(DetailBarangMasuk::class);
    }
}
