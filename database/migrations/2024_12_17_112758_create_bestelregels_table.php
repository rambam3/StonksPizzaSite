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
        Schema::create('bestelregels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bestelling_id')->constrained('bestellingen')->onDelete('cascade');
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade');
            $table->integer('aantal');
            $table->integer('afmetingen_id');
            $table->decimal('regelprijs', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bestelregels');
    }
};
