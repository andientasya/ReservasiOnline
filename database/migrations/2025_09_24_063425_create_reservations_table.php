<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // PENTING
        $table->string('name');
        $table->string('gender');
        $table->foreignId('category_id')->constrained();
        $table->string('item_name');
        $table->integer('quantity');
        $table->date('reservation_date');
        $table->time('reservation_time');
        $table->string('room_preference')->nullable();
        $table->string('bed_config')->nullable();
        $table->text('notes')->nullable();
        $table->string('status')->default('pending'); // PENTING
        $table->decimal('rating', 3, 1)->nullable(); // PENTING untuk rating
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};