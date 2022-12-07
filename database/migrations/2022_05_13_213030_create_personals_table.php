<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('doc_identidad',15)->unique();
            $table->string('nombre',70);
            $table->string('primer_apellido',50)->nullable();
            $table->string('segundo_apellido',50)->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['M','F'])->default('M');
            $table->string('comicilio')->nullable();
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('cargo_id');
            $table->double('saldo_anterior',15,2)->default(0);
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('cargo_id')->references('id')->on('cargos');
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
        Schema::dropIfExists('personals');
    }
}
