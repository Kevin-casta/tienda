<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('total')->nullable();
            $table->unsignedBigInteger('users_id') ->nullable();
            $table->unsignedBigInteger('clientes_id') ->nullable();

            $table -> foreign('users_id')->references('id')->on('users');
            $table -> foreign('clientes_id')->references('id')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
