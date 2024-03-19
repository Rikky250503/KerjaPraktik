<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'nama_status' =>'Menunggu pengiriman'
            ],
            [
                'nama_status' =>'Pesanan dikirim'
            ],
            [
                'nama_status' =>'Pesansn diterima'
            ]
            ];
        Status::insert($status);
    }
}
