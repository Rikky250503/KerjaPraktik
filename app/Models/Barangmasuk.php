<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barangmasuk extends Model
{
    use HasFactory,HasUlids;

    protected $table ='tbl_barangmasuk';
    protected $primary_key ='id_barang_masuk';
    protected $dates =['tanggal_masuk'];
    protected $fillable = ['nomor_invoice_masuk','total'];
    protected $foreign_key ='created_by';

    public function detailbarangmasuk(): HasMany
    {
        return $this->hasMany(DetailBarangMasuk::class);
    }

    public function Supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function useradmin(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
