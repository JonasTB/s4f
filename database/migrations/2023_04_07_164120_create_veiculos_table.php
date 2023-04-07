<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('portas');
            $table->string('modelo');
            $table->string('cor');
            $table->string('fabricante');
            $table->integer('ano_fabricacao');
            $table->string('placa')->unique();
            $table->string('chassi')->unique();
            $table->string('data_criacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
};
