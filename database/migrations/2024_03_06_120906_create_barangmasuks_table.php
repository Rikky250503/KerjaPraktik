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
        Schema::create('tbl_barangmasuk', function (Blueprint $table) {
            $table->uuid('id_barang_masuk')->primary()->default(DB::raw('(UUID())'));;;
            $table->date('tanggal_masuk');
            $table->string('nomor_invoice_masuk');
            $table->double('total');
            $table->foreignUlid('id_supplier')->references('id_supplier')->on('tbl_supplier')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('created_by')->references('id_user')->on('tbl_useradmin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barangmasuk');
    }
};
