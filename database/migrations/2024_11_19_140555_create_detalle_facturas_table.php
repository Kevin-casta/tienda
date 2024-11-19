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
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cantidad');
            $table->integer('precio_unit');
            $table->integer('descuento_aplic');
            $table->unsignedBigInteger('facturas_id');
            $table->unsignedBigInteger('productos_id');

            $table -> foreign('facturas_id')->references('id')->on('facturas');
            $table -> foreign('productos_id')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_facturas');
    }
};
