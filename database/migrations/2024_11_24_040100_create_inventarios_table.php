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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> integer("cantidad");
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('categoria_id');

            $table -> foreign('productos_id')->references('id')->on('productos');
            $table -> foreign('categoria_id')->references('id')->on('categoria_prods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
