<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'tbl_supplier';
    protected $primary_key = 'id_supplier';
    protected $fillable = ['nama_supplier','no_hp','alamat'];

    public function barangmasuk() : HasMany
    {
        return $this->hasMany(Barangmasuk::class);
    }
}
