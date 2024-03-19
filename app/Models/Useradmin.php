<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Useradmin extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'tbl_useradmin';
    protected $primary_key = 'id_user';
    protected $fillable = ['username','jabatan','nama'];
    protected $hidden = ['password'];

    public static $rules = [
      'jabatan' =>'required|in:P,J,G'
    ];

// Atur aturan validasi pada saat booting model(Uji coba GPT)
public static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        // Validasi pada saat pembuatan user baru
        if (!in_array($model->jabatan, ['P','J','G'])) {
            throw new \Exception("Jabatannya valid");
        }
    });

    static::updating(function ($model) {
        // Validasi pada saat pembaruan user
        if (!in_array($model->jabatan, ['P','J','G'])) {
            throw new \Exception("Jabatannya tidak valid");
        }
    });
}
   public function barangmasuk(): HasOne
   {
     return $this->hasOne(BarangMasuk::class);
   }
}