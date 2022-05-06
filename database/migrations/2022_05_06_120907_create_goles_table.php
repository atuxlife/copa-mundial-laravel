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
        Schema::create('goles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partido_id')->constrained('partidos');
            $table->foreignId('jugador_id')->constrained('jugadores');
            $table->integer('minuto');
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
        Schema::dropIfExists('goles');
    }
};
