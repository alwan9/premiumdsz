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
        Schema::create('produk_software', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_produk');
            $table->unsignedBigInteger('Id_software');

            $table->foreign('Id_produk')->references('Id_produk')->on('produk_digital')->onDelete('cascade');
            $table->foreign('Id_software')->references('Id_software')->on('software')->onDelete('cascade');

            $table->primary(['Id_produk', 'Id_software']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_software');
    }
};
