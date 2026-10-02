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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id('Id_Layanan');
            $table->unsignedBigInteger('Id_produk')->nullable();
            $table->string('Nama_layanan');
            $table->text('Benefit')->nullable();
            $table->text('Des_layanan')->nullable();
            $table->timestamp('Created_at')->nullable();
            $table->timestamp('Update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
