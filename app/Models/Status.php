<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Status extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'tbl_status';
    protected $primary_key = 'id_status';
    protected $fillable = ['nama_status'];

    public function barang_keluar(): HasOne
    {
        return $this->hasOne(Barangkeluar::class);
    }
}
