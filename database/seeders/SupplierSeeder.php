<?php

namespace Database\Seeders;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = [
            [
                'nama_supplier' =>'PT Abadi Jaya',
                'no_hp'=>'081278145686',
                'alamat'=>'Jalan Cendrawasih no.178'
            ],
            [
                'nama_supplier' =>'PT Trijaya',
                'no_hp'=>'085210078121',
                'alamat'=>'Jalan Yosudarso no.105'
            ],
            [
                'nama_supplier' =>'PT Sumatera Unggul',
                'no_hp'=>'088225501708',
                'alamat'=>'Jalan Soekarno Hatta no.777'
            ]
            ];
        Supplier::insert($supplier);
        
    }
}
