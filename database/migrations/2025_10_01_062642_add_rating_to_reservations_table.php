<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Tambahkan kolom rating jika belum ada
            if (!Schema::hasColumn('reservations', 'rating')) {
                $table->decimal('rating', 3, 1)->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};