<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 10)->unique();
            $table->string('nombres', 120);
            $table->string('apellidos', 120);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20);
            $table->string('email', 50)->nullable();
            $table->unsignedBigInteger('nivel_id');
            $table->timestamps();
            // Campo para referenciar la tabla de niveles 
            $table->foreign('nivel_id')->references('id')->on('niveles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
