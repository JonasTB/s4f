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
        Schema::create('locadoras', function (Blueprint $table) {
            $table->id();
            $table->string('fantasia');
            $table->string('razao_social');
            $table->string('cnpj');
            $table->string('email');
            $table->string('endereco')->default('null');
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
        Schema::dropIfExists('locadoras');
    }
};
