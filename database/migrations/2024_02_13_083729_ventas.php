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
        //
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_tramite');
            $table->string('cliente');
            $table->integer('costo');
            $table->integer('precio_venta');
            $table->string('estado');
            $table->timestamps();

            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
