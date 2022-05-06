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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipoa_id')->constrained('equipos');
            $table->foreignId('equipob_id')->constrained('equipos');
            $table->foreignId('ganador_id')->constrained('equipos');
            $table->integer('golesa');
            $table->integer('golesb');
            $table->integer('amarillasa');
            $table->integer('amarillasb');
            $table->integer('rojasa');
            $table->integer('rojasb');
            $table->enum('ronda', ['I', 'O', 'C', 'S', 'T', 'F']); // (I)nicial, (O)ctavos, (C)uartos, (S)emifinal, (T)ercer puesto, (F)inal
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
        Schema::dropIfExists('partidos');
    }
};
