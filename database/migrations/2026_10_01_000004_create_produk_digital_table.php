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
        Schema::create('produk_digital', function (Blueprint $table) {
            $table->id('Id_produk');
            $table->unsignedBigInteger('Id_kategori');
            $table->unsignedBigInteger('Id_layanan')->nullable();
            $table->string('Nama_produk');
            $table->string('No_wa', 30)->nullable();
            $table->integer('Stok_produk')->default(0);
            $table->text('Des_produk')->nullable();
            $table->timestamp('Created_at')->nullable();
            $table->timestamp('Update_at')->nullable();

            $table->foreign('Id_kategori')->references('Id_kategori')->on('kategori')->onDelete('cascade');
            $table->foreign('Id_layanan')->references('Id_Layanan')->on('layanan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_digital');
    }
};
