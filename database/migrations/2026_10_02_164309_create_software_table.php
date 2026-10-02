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
        Schema::create('software', function (Blueprint $table) {
            $table->id('Id_software');
            $table->string('Nama_software');
            $table->string('Logo_url')->nullable();
            $table->text('Des_software')->nullable();
            $table->timestamp('Created_at')->nullable();
            $table->timestamp('Update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};
