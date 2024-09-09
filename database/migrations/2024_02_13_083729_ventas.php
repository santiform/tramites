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
            $table->integer('id_tramite');
            $table->string('cliente', 255);
            $table->integer('costo')->nullable();
            $table->integer('precio_venta')->nullable();
            $table->string('dato1', 255)->nullable();
            $table->string('dato2', 255)->nullable();
            $table->string('dato3', 255)->nullable();
            $table->string('dato4', 255)->nullable();
            $table->text('observaciones')->nullable();
            $table->string('estado', 255)->nullable();
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
