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
        Schema::create('variantes_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prenda_id')->constrained('prendas')->onDelete('cascade');
            $table->string('tipo')->default('numero');
            $table->string('valor');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variantes_producto');
    }
};
