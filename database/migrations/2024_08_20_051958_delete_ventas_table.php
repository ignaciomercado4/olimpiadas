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
        Schema::dropIfExists('ventas');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('total');
            $table->string('comprador');
            $table->unsignedBigInteger('numero_pedido');
            $table->string('direccion');

            $table->foreign('numero_pedido')->references('id')->on('pedidos')->onDelete('cascade');
        });
    }
};
