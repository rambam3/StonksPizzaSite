<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BestelMethode;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bestellingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klant_id')->constrained('klanten')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('datum');
            $table->string('status');
            $table->enum('bestelMethode', BestelMethode::getValues());
            $table->decimal('totaalPrijs', 6, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bestellingen');
    }
};
