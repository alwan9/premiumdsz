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
        if (! Schema::hasColumn('produk_digital', 'Estimasi')) {
            Schema::table('produk_digital', function (Blueprint $table) {
                $table->string('Estimasi', 100)->default('1-2 Hari')->nullable()->after('Stok_produk');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('produk_digital', 'Estimasi')) {
            Schema::table('produk_digital', function (Blueprint $table) {
                $table->dropColumn('Estimasi');
            });
        }
    }
};
