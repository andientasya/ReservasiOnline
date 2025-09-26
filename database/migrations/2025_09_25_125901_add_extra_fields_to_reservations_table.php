<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('name')->nullable()->after('category_id');
            $table->string('gender')->nullable()->after('name');
            $table->string('room_preference')->nullable()->after('quantity');
            $table->string('bed_config')->nullable()->after('room_preference');
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['name', 'gender', 'room_preference', 'bed_config']);
        });
    }
};
