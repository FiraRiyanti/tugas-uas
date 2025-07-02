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
         Schema::create('mitras', function (Blueprint $table) {
        $table->id(); // ID Mitra (primary key otomatis)
        $table->string('nama_toko');
        $table->string('jenis_produk');
        $table->string('kota');
        $table->string('status');
        $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
