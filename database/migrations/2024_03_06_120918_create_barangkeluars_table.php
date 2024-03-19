<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_barangkeluar', function (Blueprint $table) {
            $table->uuid('id_barang_keluar')->primary()->default(DB::raw('(UUID())'));;;
            $table->date('tanggal_keluar');
            $table->string('nomor_invoice_keluar');
            $table->double('total');
            $table->string('nama_pemesan');
            $table->string('alamat_pemesan');
            $table->string('no_hp_pemesan');
            $table->foreignUuid('id_status')->references('id_status')->on('tbl_status')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barangkeluar');
    }
};
