<?php

namespace Database\Seeders;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' =>'Semen'
            ],
            [
                'nama_kategori' =>'Seng'
            ],
            [
                'nama_kategori' =>'Playwood'
            ]
            ];
        Kategori::insert($kategori);
        
    }
}
