<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Barangkeluar extends Model
{
    use HasFactory, HasUuids;

    protected $table  = 'tbl_barang_keluar';
    protected $primary_key = 'id_barang_keluar';
    protected $dates =['tanggal_keluar'];
    protected $fillable = ['nomor_invoice_keluar','total','nama_pemesan','alamat_pemesan','no_hp_pemesan'];
    protected $foreign_key = 'id_status';

    public function status() :BelongsTo
    {
        return $this->belongsTo(Status::class,'id_status');
    }

    public function detailBarangKeluar() : HasMany
    {
        return $this->hasMany(DetailBarangKeluar::class,'id_barang_keluar');
    }
}
