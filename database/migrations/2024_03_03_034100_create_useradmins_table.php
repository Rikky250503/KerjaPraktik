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
        Schema::create('tbl_useradmin', function (Blueprint $table) {
            $table->uuid('id_user')->primary()->default(DB::raw('(UUID())'));;;
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->enum('jabatan',['P','J','G'])->default('G');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_useradmin');
    }
};
