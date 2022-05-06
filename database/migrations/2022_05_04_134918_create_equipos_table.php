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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('bandera');
            $table->string('grupo');
            $table->boolean('inicial')->default(true);
            $table->boolean('octavos')->default(false);
            $table->boolean('cuartos')->default(false);
            $table->boolean('semifinales')->default(false);
            $table->boolean('tercerpuesto')->default(false);
            $table->boolean('final')->default(false);
            $table->boolean('cuarto')->default(false);
            $table->boolean('tercero')->default(false);
            $table->boolean('subcampeon')->default(false);
            $table->boolean('campeon')->default(false);
            $table->boolean('eliminado')->default(false);
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
        Schema::dropIfExists('equipos');
    }
};
