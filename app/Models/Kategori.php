<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kategori extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tbl_kategori';
    protected $primary_key = 'id_kategori';
    protected $fillable = ['nama_kategori'];

    public function barang(): HasOne
    {
        return $this->hasOne(Barang::class);
    }
}
